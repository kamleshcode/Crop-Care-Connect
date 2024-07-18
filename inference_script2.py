import os
import numpy as np
import argparse
import tensorflow as tf
from tensorflow.keras import layers, models
from sklearn.model_selection import train_test_split
from tensorflow.keras.preprocessing.image import ImageDataGenerator
import sys

import sys
sys.stdout.reconfigure(encoding='utf-8')

from PIL import Image
import numpy as np
import tensorflow as tf
 
loaded_model = tf.keras.models.load_model('crop_disease_model_real.h5')


class_labels=[
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

# Assuming loaded_model is defined and class_labels is defined
def main(image_path, confidence_threshold=0.5):
    try:
        img = Image.open(image_path)
        test_image_array = tf.keras.preprocessing.image.img_to_array(img)
        test_image_array = np.expand_dims(test_image_array, axis=0)  # Add batch dimension
        test_image_array /= 255.0  # Normalize pixel values
        predictions = loaded_model.predict(test_image_array)
        
        # Get the index and label of the class with the highest probability
        predicted_class_index = np.argmax(predictions)
        predicted_class_label = class_labels[predicted_class_index]
        
        # Get the probability of the predicted class
        predicted_probability = predictions[0, predicted_class_index]

        if predicted_probability >= confidence_threshold:
             print(f'Predicted class of disease = : {predicted_class_label} And <br> confidence: {predicted_probability}')
        else:
            print('No matching class found. Model confidence below threshold.')
        
    except Exception as e:
        print(f"Error processing image: {e}")

if __name__ == "__main__":
    if len(sys.argv) != 2:
        print("Usage: python script.py <image_path>")
        sys.exit(1)

    image_path = sys.argv[1]
    main(image_path)

