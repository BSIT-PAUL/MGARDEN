import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LinearRegression
from sklearn.metrics import mean_squared_error
from sklearn.impute import SimpleImputer
from sqlalchemy import create_engine
import pickle

# Your MySQL connection details
db_engine = create_engine('mysql+mysqlconnector://root:@localhost/MGARDEN')

# Your SQL query
query = """
    SELECT r.amount, r.start_datetime, r.end_datetime, c.phone
    FROM rentals r
    JOIN transactions t ON r.transact_id = t.id
    JOIN customers c ON t.customer_id = c.id
"""

df = pd.read_sql(query, db_engine)

print(df.shape)
# Handle NaN values in the DataFrame
df.dropna(inplace=True)  # Drop rows with missing values

# Feature engineering - extract relevant features
df['start_datetime'] = pd.to_datetime(df['start_datetime'])
df['end_datetime'] = pd.to_datetime(df['end_datetime'])
df['booking_duration'] = (df['end_datetime'] - df['start_datetime']).dt.days

# Prepare data for regression analysis
X = df[['amount', 'booking_duration']]  # Features
y = df['phone']  # Target variable (phone number as a proxy for customer demand)

# Split the data into training and testing sets
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# Handle NaN values using mean imputation
imputer = SimpleImputer(strategy='mean')
X_train = imputer.fit_transform(X_train)
X_test = imputer.transform(X_test)

# Create and train the model
model = LinearRegression()
model.fit(X_train, y_train)

# Make predictions on the test set
y_pred = model.predict(X_test)

# Evaluate the model
mse = mean_squared_error(y_test, y_pred)
print(f'Mean Squared Error: {mse}')

# Save the model to a file using pickle
with open('customer_demand_model.pkl', 'wb') as model_file:
    pickle.dump(model, model_file)

# Output results in CSV format
output_df = pd.DataFrame({'Actual': y_test, 'Predicted': y_pred})
output_df.to_csv('output_results.csv', index=False)