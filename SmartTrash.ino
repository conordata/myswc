#include <SoftwareSerial.h>
SoftwareSerial gprsSerial(5, 6);

String idTrash = "bbmp/kamanahalli/trash0001", idCollector = "0000";
int weight;
#define cardSensor 2

/************************************* RFID SENSOR *************************************/

#include <SPI.h>
#include <MFRC522.h>

#define SS_PIN 10
#define RST_PIN 9
 
MFRC522 rfid(SS_PIN, RST_PIN); // Instance of the class

MFRC522::MIFARE_Key key; 

// Init array that will store new NUID 
String readCard[4];
bool sender=1;
bool cardDect;

/************************************* LEVEL SENSOR *************************************/

#define trigPin 7
#define echoPin 8 

long duration; // variable for the duration of sound wave travel
int distance, level; // variable for the distance measurement

void setup()
{
  gprsSerial.begin(19200);
  Serial.begin(19200);

  Serial.println("Config SIM900...");
  delay(2000);
  Serial.println("Done!...");
  gprsSerial.flush();
  Serial.flush();

  // attach or detach from GPRS service 
  gprsSerial.println("AT+CGATT?");
  delay(100);
  toSerial();

  // bearer settings
  gprsSerial.println("AT+SAPBR=3,1,\"CONTYPE\",\"GPRS\"");
  delay(2000);
  toSerial();

  // bearer settings
  gprsSerial.println("AT+SAPBR=3,1,\"APN\",\"airtelgprs.com\"");
  delay(2000);
  toSerial();
  delay(2000);

  // bearer settings
  gprsSerial.println("AT+SAPBR=1,1");
  delay(2000);
  toSerial();

  // bearer settings
  gprsSerial.println("AT+SAPBR=2,1");
  delay(2000);
  toSerial();
  
  /************************************* RFID SENSOR *************************************/

//  Serial.begin(9600);
  SPI.begin(); // Init SPI bus
  rfid.PCD_Init(); // Init MFRC522 

  for (byte i = 0; i < 6; i++) {
    key.keyByte[i] = 0xFF;
  }

  pinMode(cardSensor, INPUT);

  /************************************* LEVEL SENSOR *************************************/

  pinMode(trigPin, OUTPUT); // Sets the trigPin as an OUTPUT
  pinMode(echoPin, INPUT); // Sets the echoPin as an INPUT
  
}

void loop()
{
  // Reset the loop if no new card present on the sensor/reader. This saves the entire process when idle.
  
  cardDect=digitalRead(cardSensor);
  
  if ((cardDect==0) && (sender==0)) {
    communication(1);
    sender=1;
    Serial.println("Collection data sending OK!");
  }
  
  else if (!cardDect) {
    weight=1;
    levelSensor();
    communication(0);
    Serial.println(level);
    Serial.println("Normal update sending OK!");
  }

  getUid();
  
}

/************************************* GSM MODULE *************************************/

void toSerial()
{
  while(gprsSerial.available()!=0)
  {
    Serial.write(gprsSerial.read());
  }
}

void communication(bool contr)  //controller 0 for monitoring 1 for collection
{
  // build url to send

  String controller;
  if (!contr) controller = "newHistoric.php?idTrash=" + idTrash + "&level=" + String(level) + "&weight=" + String(weight);
  else controller = "newScan.php?idUser=" + idCollector + "&idTrash=" + idTrash;
  
  // initialize http service
  
  gprsSerial.println("AT+HTTPINIT");
  delay(2000); 
  toSerial();
  
  // set http param value
  
  gprsSerial.println("AT+HTTPPARA=\"URL\",\"swc-monitor.000webhostapp.com/controllers/" + controller +"\"");
  delay(5000);
  toSerial();
  
  // set http action type 0 = GET, 1 = POST, 2 = HEAD
  
  gprsSerial.println("AT+HTTPACTION=0");
  delay(6000);
  toSerial();
  
  // read server response
  
  gprsSerial.println("AT+HTTPREAD"); 
  delay(1000);
  toSerial();
  delay(2000);
  
  gprsSerial.println("");
  gprsSerial.println("AT+HTTPTERM");
  toSerial();
  delay(300);
  
  gprsSerial.println("");
  delay(10000);  
}

/************************************* LEVEL SENSOR *************************************/

void levelSensor()
{
  // Clears the trigPin condition
  
  digitalWrite(trigPin, LOW);
  delayMicroseconds(2);
  
  // Sets the trigPin HIGH (ACTIVE) for 10 microseconds
  
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);
  
  // Reads the echoPin, returns the sound wave travel time in microseconds
  
  duration = pulseIn(echoPin, HIGH);
  
  // Calculating the distance
  
  distance = duration * 0.034 / 2; // Speed of sound wave divided by 2 (go and back)
  level = (18-distance)*100/18;
  
  // Displays the distance on the Serial Monitor
  
  Serial.print("Distance: ");
  Serial.print(distance);
  Serial.println(" cm");
}

/************************************* RFID SENSOR *************************************/

bool getUid() 
{
  if ( ! rfid.PICC_IsNewCardPresent()) {
    Serial.println("No Card detected!!");
    return;
  }
  
  // Verify if the NUID has been readed
  if ( ! rfid.PICC_ReadCardSerial())
    return;

  // Store NUID into nuidPICC array
  
  Serial.println("Collection in progress OK!");
  for (byte i = 0; i < 4; i++) {
    readCard[i] = String(rfid.uid.uidByte[i], HEX);
    }
  idCollector=(readCard[0]+readCard[1]+readCard[2]+readCard[3]);
  sender=0;
  Serial.println(idCollector);  
}
