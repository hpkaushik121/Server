char c;
void setup()
{
  Serial.begin(9600);
  pinMode(3, OUTPUT);
}

void loop()
{
  if (Serial.available() > 0)
  {
    c = Serial.read();
    Serial.println(c);
  }
  else
  {
    delay(100);
  }
  if (c=='n')
  {
    Serial.println("on");
    digitalWrite(3, HIGH);
  }

if (c=='f')
{
  Serial.println("off");
  digitalWrite(3, LOW);
}
  c='\0';
}
