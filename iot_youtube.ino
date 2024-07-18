#include <ESP8266HTTPClient.h>
#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <DHT.h>

#define DHTPIN 5     // Digital pin D1 connected to the DHT sensor
#define DHTTYPE    DHT11     // DHT 11

DHT dht(DHTPIN, DHTTYPE);

WiFiClient client;
const char* ssid = "iPhone";
const char* password = "Mahim0000";
 
const char* serverName = "http://172.20.10.5/farmtech-master/post-data.php";
 
String apiKeyValue = "#54321";
 
String sensorName = "AllSensor";
String sensorLocation = "farm";
int value1;
int sensor = A0;

 
void setup() {
  pinMode(sensor, INPUT);
  Serial.begin(115200);
  Serial.println("DHT11 Output");
   dht.begin();
  WiFi.begin(ssid, password);
  Serial.println("Connecting to the Wifi Network");
  while(WiFi.status() != WL_CONNECTED) { 
    delay(1000);
    Serial.println(".");
  }
  Serial.println("");
  Serial.println("WiFi is Connected at this IP Address : ");
  Serial.println(WiFi.localIP());
 
 
}
 
void loop() {
  
  //Check WiFi connection status
value1 = analogRead(sensor); // mapping the rrange to 0-100
int value10 = map(value1, 0, 1024, 0,100);
int value11 = (value10 - 100) * -1;
    float temperature = dht.readTemperature();
  float humidity = dht.readHumidity(); 
  
  if(WiFi.status()== WL_CONNECTED){
    HTTPClient http;
    
    http.begin(client,serverName);
    
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");
    //Serial.println(cm);
    // Prepare your HTTP POST request data
    String httpRequestData = "api_key=" + apiKeyValue + "&SensorData=" + sensorName
                          + "&LocationData=" + sensorLocation + "&value1=" + temperature + "&value2=" + humidity + "&value3=" + value11 + "";
     //String httpRequestData ="api_key=#54321&SensorData=distance sensor&LocationData=Aicpecf-office&value1=NULL&value2=NULL&value3=NULL";
    Serial.print("httpRequestData: ");
    Serial.println(httpRequestData);
    
 
    int httpResponseCode = http.POST(httpRequestData);
     
 
    if (httpResponseCode>0) {
      Serial.print("HTTP Response code: ");
      Serial.println(httpResponseCode);
    }
    else {
      Serial.print("Error code: ");
      Serial.println(httpResponseCode);
    }
 
    http.end();
  }
  else {
    Serial.println("WiFi Disconnected");
  }
  delay(10000);  
}
