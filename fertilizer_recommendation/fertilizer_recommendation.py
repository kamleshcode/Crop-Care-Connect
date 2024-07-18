import sys
import json
import pandas as pd
from sklearn.preprocessing import LabelEncoder
from sklearn.tree import DecisionTreeClassifier

# Load the dataset
data = pd.read_csv("fertilizer_recommendation/fertilizer_recommendation.csv")

# Label encoding for categorical features
le_soil = LabelEncoder()
data['Soil Type'] = le_soil.fit_transform(data['Soil Type'])
le_crop = LabelEncoder()
data['Crop Type'] = le_crop.fit_transform(data['Crop Type'])

# Splitting the data into input and output variables
X = data.iloc[:, :8]
y = data.iloc[:, -1]

# Training the Decision Tree Classifier model
dtc = DecisionTreeClassifier(random_state=0)
dtc.fit(X, y)

# Read input JSON from PHP
input_json = sys.stdin.readline()

# Parse input JSON
input_data = json.loads(input_json)

# Extract input parameters
jsontemp = input_data['temperature']
jsonn = input_data['nitrogen']
jsonp = input_data['phosphorus']
jsonk = input_data['potassium']
jsont = input_data['soil_type']
jsonh = input_data['crop_type']
jsonsm = input_data['soil_moisture']
jsonhumi = input_data['humidity']

# Encode categorical features
soil_enc = le_soil.transform([jsont])[0]
crop_enc = le_crop.transform([jsonh])[0]

# Prepare user input as a numpy array
user_input = [[jsontemp, jsonhumi, jsonsm, soil_enc, crop_enc, jsonn, jsonp, jsonk]]

# Predict fertilizer
fertilizer_name = dtc.predict(user_input)

# Return the prediction as a string
print(fertilizer_name[0])
