import cv2
import numpy as np
from tensorflow import keras

# Load the trained model
model = keras.models.load_model("crop_agent.h5")

# Function to preprocess the input image
def preprocess_image(image_path):
    image = cv2.imread(image_path)
    image = cv2.resize(image, (224, 224))
    image = image / 255.0  # Normalize pixel values to between 0 and 1
    return np.expand_dims(image, axis=0)  # Add batch dimension

# Function to make predictions
def predict_disease(image_path):
    preprocessed_image = preprocess_image(image_path)
    prediction = model.predict(preprocessed_image)
    predicted_class_index = np.argmax(prediction)
    confidence = prediction[0][predicted_class_index]
    return predicted_class_index, confidence

if __name__ == "__main__":
    import sys

    if len(sys.argv) != 2:
        print("Usage: python predict.py <image_path>")
        sys.exit(1)

    image_path = sys.argv[1]
    
    # Get prediction
    class_index, confidence = predict_disease(image_path)

    # Print the result
    print(f"Predicted Disease Class Index: {class_index}")
    print(f"Confidence: {confidence}")