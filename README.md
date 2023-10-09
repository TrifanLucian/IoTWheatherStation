# IoTWheatherStation
IoT Project 
Acest Proiect reprezinta o statie meteo pentru care am folosit urmatoarele:
    - placa breadboard
    - plata arduino "arduino-mkr-wifi-1010" cu modul WiFi pentru conectivitate la retelele WiFi
    - senzor de temperatura si umiditate DHT11
    - Senzor de presiune atmosferica  BMP280
    - Fire Jumper
    
![Poza placa](https://github.com/TrifanLucian/IoTWheatherStation/assets/111199896/dacf0975-da27-42c5-9fef-ec7f3f5987fc)

S-a folosit mediul de dezvoltare Arduino IDE 2.0.5 pentru incarcarea programelor si conectarea/comunicarea cu placa electronica.
Cu ajutorul bibliotecilor disponibile se realizeaza:
  - comunicatia seriala
  - comunicatia wireless
  - citirea si transmiterea pe seriala a parametrilor de temperatura, umiditate si presiune.
  - conectarea la serverul AwardSpace direct din placa electronica prin intermediul antenei WiFi
        - AwardSpace ofera gazduire web gratuita cu PHP si MYSQL
  - http request cu metoda GET direct din placa electronica pentru scrierea parametrilor in baza de date ( se scrie la fiecare 10 secunde )

A fost creat un site WEB pentru afisarea/citirea informatiilor din baza de date ( ultimele 10 inregistrari ) 
Informatiile privind temperatura, umiditatea si presiunea sunt afisate intr-o forma tabelata. Totodata s-a folosit un script JS pentru afisarea acestor date sub forma de ceasuri pentru o interfata mai prietenoasa.


![Serial Monitor + Site](https://github.com/TrifanLucian/IoTWheatherStation/assets/111199896/fcf51438-ab5e-414b-8d56-3efc2e83e63f)

![phpMyAdmin](https://github.com/TrifanLucian/IoTWheatherStation/assets/111199896/e2d15371-5c93-4f7a-b3ce-2cea422ac655)

![AwardSpace](https://github.com/TrifanLucian/IoTWheatherStation/assets/111199896/452f3554-3426-4b70-91d6-1e70630c51d4)

