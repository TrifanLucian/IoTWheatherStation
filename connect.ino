#include <DHT.h>
#include <DHT_U.h>
#define DHTPIN 6   
#define DHTTYPE DHT11

#include <Wire.h>
#include <SPI.h>
#include <Adafruit_BMP280.h>
#define BMP280_ADDRESS 0x76
Adafruit_BMP280 bmp; // I2C

#include <WiFiNINA.h>

DHT dht(DHTPIN, DHTTYPE);

//char ssid[] = "DIGI-ZTpa";  // wireless network name
//char password[] = "EZ8NwN26"; // wireless password

char ssid[] = "AndroidAPc5f0";  // wireless network name
char password[] = "12345678"; // wireless password

int status = WL_IDLE_STATUS;
WiFiClient client;

//char servername[] = "192.168.100.3";
char servername[] = "luciantrifan.atwebpages.com";

float boardTEMP;
float boardHUMID;
float boardPRES;

void setup() {
  // put your setup code here, to run once:
  Serial.begin(9600);
  delay(1500);

  if (WiFi.status() == WL_NO_MODULE) {
    Serial.println("Communication with WiFi module failed!");
    // don't continue
    while (true);
  }

  // attempt to connect to Wifi network:
  while (status != WL_CONNECTED) {
    Serial.print("Attempting to connect to WPA SSID: ");
    Serial.println(ssid);
    // Connect to WPA/WPA2 network:
    status = WiFi.begin(ssid, password);

  }

  dht.begin();
  bmp.begin(BMP280_ADDRESS);

  bmp.setSampling(Adafruit_BMP280::MODE_NORMAL,     /* Operating Mode. */
              Adafruit_BMP280::SAMPLING_X2,     /* Temp. oversampling */
              Adafruit_BMP280::SAMPLING_X16,    /* Pressure oversampling */
              Adafruit_BMP280::FILTER_X16,      /* Filtering. */
              Adafruit_BMP280::STANDBY_MS_500); /* Standby time. */
}

void loop() {
  // put your main code here, to run repeatedly:
  delay(10000);
  boardTEMP = dht.readTemperature();
  boardHUMID = dht.readHumidity();
  boardPRES = bmp.readPressure();

  Serial.print("Temperature = ");
  Serial.print(boardTEMP);
  Serial.println("°C");

  Serial.print("Humidity = ");
  Serial.print(boardHUMID);
  Serial.println("% ");

  Serial.print(("Pressure = "));
  Serial.print(boardPRES/133.3);
  Serial.println(" mmHg");

  Sending_To_Database();
}

void Sending_To_Database()
{
  if(client.connect(servername, 80)) {
    Serial.println("connected");
    //Serial.print("GET /Arduino/meteo.php?temperature=");
    //client.print("GET /Arduino/meteo.php?temperature=");
    Serial.print("GET /Arduino/meteo.php?temperature=");
    client.print("GET /Arduino/meteo.php?temperature=");
    Serial.println(boardTEMP);
    client.print(boardTEMP);

    client.print("&humidity=");
    Serial.println("&humidity=");
    Serial.println(boardHUMID);
    client.print(boardHUMID);

    client.print("&pressure=");
    Serial.println("&pressure=");
    Serial.println(boardPRES/133.3);
    client.print(boardPRES/133.3);

    client.print(" ");
    client.print("HTTP/1.1");
    client.println();
    //client.println("Host: 192.168.100.3");
    client.println("Host: luciantrifan.atwebpages.com");
    client.println("Connection: close");
    client.println();

  } else {
    Serial.println("connection failed");
  }
}
