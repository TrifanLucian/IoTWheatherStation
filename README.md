# IoTWheatherStation
This project represents a weather station for which I used the following:
    - breadboard
    - arduino board "arduino-mkr-wifi-1010" with WiFi module for connectivity to WiFi networks
    - DHT11 temperature and humidity sensor
    - BMP280 atmospheric pressure sensor
    - Jumper wires

The Arduino IDE 2.0.5 development environment was used to load the programs and connect/communicate with the electronic board. With the help of the available libraries it was achieved
    - serial communication
    - wireless communication
    - reading and serial transmission of temperature, humidity and pressure parameters.
    - connecting to the AwardSpace server directly from the electronic board via the WiFi antenna 
        - AwardSpace offers free web hosting with PHP and MYSQL
    - http request with the GET method directly from the electronic board for writing the parameters in the database (written every 10 seconds)

A WEB site was created for displaying/reading the information from the database (the last 10 records). The information regarding temperature, humidity and pressure is displayed in a tabular form. At the same time, a JS script was used to display these data in the form of clocks for a friendlier interface.


![Serial Monitor + Site](https://github.com/TrifanLucian/IoTWheatherStation/assets/111199896/fcf51438-ab5e-414b-8d56-3efc2e83e63f)

![phpMyAdmin](https://github.com/TrifanLucian/IoTWheatherStation/assets/111199896/e2d15371-5c93-4f7a-b3ce-2cea422ac655)

![AwardSpace](https://github.com/TrifanLucian/IoTWheatherStation/assets/111199896/452f3554-3426-4b70-91d6-1e70630c51d4)

![Poza placa](https://github.com/TrifanLucian/IoTWheatherStation/assets/111199896/dacf0975-da27-42c5-9fef-ec7f3f5987fc)
