import pandas as pd
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import linear_kernel
from sqlalchemy import create_engine

# Establish a connection to your MySQL database
connection_string ='mysql+mysqlconnector://root:@localhost/MGARDEN'
engine = create_engine(connection_string)

# Load data into pandas DataFrames
rooms = pd.read_sql("SELECT `RoomID`, `RoomType`, `RoomCapacity`, `RoomPrice` FROM `rooms`", engine)
customers = pd.read_sql("SELECT `id`, `fullname`, `address` FROM `customers`", engine)
rentals = pd.read_sql("SELECT `id`, `cottage_id`, `user_id`, `start_datetime`, `end_datetime` FROM `rentals`", engine)

# Preprocess data
rooms['features'] = rooms['RoomType'] + ' ' + rooms['RoomCapacity'].astype(str)
customers['preferences'] = customers['fullname'] + ' ' + customers['address']

# Merge data to get relevant features for recommendation
merged_data = pd.merge(rentals, rooms, left_on='RoomID', right_on='RoomID')
merged_data = pd.merge(merged_data, customers, left_on='user_id', right_on='id')

# Vectorize text data
tfidf_vectorizer = TfidfVectorizer(stop_words='english')
tfidf_matrix = tfidf_vectorizer.fit_transform(merged_data['features'])

# Compute similarity scores
cosine_sim = linear_kernel(tfidf_matrix, tfidf_matrix)

# Function to recommend rooms
def recommend_room(customer_id, cosine_sim=cosine_sim, df=merged_data):
    idx = df[df['user_id'] == customer_id].index[0]
    sim_scores = list(enumerate(cosine_sim[idx]))
    sim_scores = sorted(sim_scores, key=lambda x: x[1], reverse=True)
    sim_scores = sim_scores[1:11]  # Top 10 similar rooms
    
    room_indices = [i[0] for i in sim_scores]
    
    return df[['RoomID', 'RoomType', 'RoomCapacity']].iloc[room_indices]

# Example usage
customer_id = 123  # Customer ID for whom you want to recommend rooms
recommendations = recommend_room(customer_id)
print(recommendations)