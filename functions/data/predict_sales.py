import plotly.graph_objs as go
from plotly.subplots import make_subplots
import pandas as pd
from sklearn.ensemble import RandomForestRegressor
from sqlalchemy import create_engine
from datetime import datetime
# Establish a connection to your MySQL database
connection_string = 'mysql+mysqlconnector://root:@localhost/MGARDEN'
engine = create_engine(connection_string)

# SQL query to fetch data
query = """
SELECT r.id AS rental_id,
           r.type AS rental_type,
           c.name AS cottage_name,
           r.created_at AS created_at,
           r.start_datetime AS startdate,
           r.end_datetime AS enddate,
           t.payment_status AS payment_status,
           CASE
               WHEN r.type = 'day' THEN c.priceDay
               WHEN r.type = 'night' THEN c.priceNight
               WHEN r.type = 'package' THEN c.pricePackage
               ELSE 0
           END AS cottage_price
       FROM rentals r
       JOIN cottages c ON r.cottage_id = c.id
       JOIN `transactions` t ON r.transact_id = t.id
       WHERE status = 'Proceed';
"""

# Load data into DataFrame
df = pd.read_sql(query, engine)

# Preprocess the data
df['created_at'] = pd.to_datetime(df['created_at'])
df['startdate'] = pd.to_datetime(df['startdate'])
df['enddate'] = pd.to_datetime(df['enddate'])
df['month'] = df['created_at'].dt.month
df['day_of_week'] = df['created_at'].dt.dayofweek
df['duration'] = (df['enddate'] - df['startdate']).dt.days

# Train RandomForestRegressor model
model = RandomForestRegressor(random_state=42)
model.fit(df[['month', 'day_of_week', 'duration']], df['cottage_price'])



# Predict future sales for the next 6 months
future_dates = pd.date_range(datetime.now(), periods=6, freq='M')
future_data = pd.DataFrame({'month': future_dates.month,
                            'day_of_week': future_dates.dayofweek,
                            'duration': [5, 5, 5, 5, 5, 5]})  # Assuming duration is constant
future_sales = model.predict(future_data)

# Create an interactive plot
fig = make_subplots(rows=1, cols=1)
fig.add_trace(go.Scatter(x=future_dates, y=future_sales, mode='lines+markers', name='Predicted Sales'))
fig.update_layout(title='Predicted Future Sales', xaxis_title='Month', yaxis_title='Sales')
fig_json = fig.to_json()

# Save the interactive plot JSON data to a file
with open('plot.json', 'w') as file:
    file.write(fig_json)