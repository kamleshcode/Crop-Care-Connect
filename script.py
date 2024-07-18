import sys
import tensorflow as tf
from tensorflow.keras.preprocessing import image
import numpy as np
import os
import matplotlib.pyplot as plt
import sys
sys.stdout.reconfigure(encoding='utf-8')

from PIL import Image
import numpy as np
import tensorflow as tf


# Load the trained model
model = tf.keras.models.load_model('my_leaf_classification_model_MobileNetV2.h5')

# Define the class labels

# Define the class labels
class_labels =[
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

def predict_crop_disease(image_path, confidence_threshold=0.7):
    try:
        img = image.load_img(image_path, target_size=(224, 224))
        img_array = image.img_to_array(img)
        img_array = np.expand_dims(img_array, axis=0) / 255.0

        # Make predictions
        predictions = model.predict(img_array)
        predicted_class_index = np.argmax(predictions)
        predicted_class_label = class_labels[predicted_class_index]
        confidence = predictions[0, predicted_class_index]

        if confidence >= confidence_threshold:
            # Print the result without the first two lines
            print(f'Predicted class: {predicted_class_label}')
            print(f'Confidence: {confidence *100}%')
        else:
            print('Confidence below threshold. No reliable prediction.')

    except Exception as e:
        print(f"Error processing image: {e}")
        print("The image might not match any known classes or there was an error during prediction.")

if __name__ == "__main__":
    if len(sys.argv) != 2:
        print("Usage: python script.py <image_path>")
        sys.exit(1)

    image_path = sys.argv[1]
    predict_crop_disease(image_path)
