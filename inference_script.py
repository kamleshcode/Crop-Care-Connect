    # Load your dataset and perform preprocessing
    # Assuming you have a dataset with images in 'data' folder and labels in 'labels.txt'
    # Adjust the dataset loading and preprocessing according to your data
import cv2
import numpy as np
from tensorflow import keras


classes=[
    'Apple__Apple_scab',
    'Apple__Black_rot',
    'Apple__Cedar_apple_rust',
    'Apple__healthy',
    'Blueberry__healthy',
    'cherry_(including_sour)__healthy',
    'cherry_(including_sour)__Powdery_mildew',
    'Corn_(maize)___Cercospora_leaf_spot Gray_leaf_spot',
    'Corn_(maize)___Common_rust_',
    'Corn_(maize)___healthy',
    'Corn_(maize)___Northern_Leaf_Blight',
    'Grape___Black_rot',
    'Grape___Esca_(Black_Measles)',
    'Grape___healthy',
    'Grape___Leaf_blight_(Isariopsis_Leaf_Spot)',
    'Orange___Haunglongbing_(Citrus_greening)',
    'Peach___Bacterial_spot',
    'Peach___healthy',
    'Pepper,_bell___Bacterial_spot',
    'Pepper,_bell___healthy',
    'Potato___Early_blight',
    'Potato___healthy',
    'Potato___Late_blight',
    'Raspberry___healthy',
    'Soybean___healthy',
    'Squash___Powdery_mildew',
    'Strawberry___healthy',
    'Strawberry___Leaf_scorch',
    'Tomato___Bacterial_spot',
    'Tomato___Early_blight',
    'Tomato___healthy',
    'Tomato___Late_blight',
    'Tomato___Leaf_Mold',
    'Tomato___Septoria_leaf_spot',
    'Tomato___Spider_mites Two-spotted_spider_mite',
    'Tomato___Target_Spot',
    'Tomato___Tomato_mosaic_virus',
    'Tomato___Tomato_Yellow_Leaf_Curl_Virus']

# Load the trained model
loaded_model = keras.models.load_model('crop_agent.h5')

# Function to preprocess the input image
def preprocess_image(image_path):
    image = cv2.imread(image_path)
    image = cv2.resize(image, (224, 224))
    image = image / 255.0  # Normalize pixel values to between 0 and 1
    return np.expand_dims(image, axis=0)  # Add batch dimension

# Function to make predictions
def predict_crop_disease(image_path, classes):
    preprocessed_image = preprocess_image(image_path)
    prediction = loaded_model.predict(preprocessed_image)
    predicted_class_index = np.argmax(prediction)
    predicted_class = classes[predicted_class_index]
    confidence = prediction[0][predicted_class_index]
    
    return predicted_class, confidence

if __name__ == "__main__":
    # Example: Assuming you have an image 'test_image.jpg' to predict
    test_image_path = 'C:/Users/ASUS/Downloads/test-crop-k-model/plantvillage dataset/color/Grape___Black_rot/0aec6325-48be-4373-886d-fff5aeea6d26___FAM_B.Rot 3465.JPG'
    
    # Make predictions
    predicted_class, confidence = predict_crop_disease(test_image_path, classes)

    # Print the result
    print(f"Predicted Crop Disease: {predicted_class}")
    print(f"Confidence: {confidence}")
