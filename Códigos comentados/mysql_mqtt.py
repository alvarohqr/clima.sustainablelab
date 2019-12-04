import pymysql
import paho.mqtt.client as mqtt #Librería de paho mqtt
import time

#Se toma la fecha directo desde la Raspberry para evitar discrepancias con la fecha del host
now = time.strftime('%Y-%m-%d %H-%M-%S')
x=0 #variable contador

def on_connect(client,userdata,flags,rc):
    print("Conectado - Código de resultado: " + str(rc))

    #Suscripción a todos los topicos que esten conformados por "estacion/"
    client.subscribe("estacion/#")
 
# Función donde se reciben los mensajes publicados    
def on_message(client,userdata,msg):
    global t,t_i,h,p,vv,dv,wr,pm25,pm10,aq,x,now
    now = time.strftime('%Y-%m-%d %H-%M-%S')
    print(msg.topic+" "+str(msg.payload.decode("utf-8")))
    topic=str(msg.topic)
    valor= str(msg.payload.decode("utf-8"))

    if topic =="estacion/temperatura":
        t=float(valor)
        print(t)
    if topic == "estacion/temp_i":
        t_i=float(valor)
        print(t_i)
    if topic =="estacion/humedad":
        h=float(valor)
        print(h)
    if topic == "estacion/presion":
        p=float(valor)
        print(p)
    if topic == "estacion/vel_viento":
        vv=float(valor)
        print(vv)
    if topic == "estacion/dir_viento":
        dv=int(valor)
        print(dv)
    if topic == "estacion/lluvia":
        wr=float(valor)
        print(wr)
    if topic == "estacion/PM2.5":
        pm25=float(valor)
        print(pm25)
    if topic == "estacion/PM10":
        pm10=float(valor)
        print(pm10)
    if topic == "estacion/AQ_color":
        aq=valor
        print(aq)

    #sentencia SQL para almacenar los datos a la base
    sql="INSERT INTO `clima` (`ID`, `FECHA`, `TEMPERATURA`, `TEMP_INTERNA`, `HUMEDAD`, `PRESION`, `VEL_VIENTO`, `DIR_VIENTO`, `LLUVIA`, `PM2_5`, `PM10`, `COLOR`) VALUES (NULL, %s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)"
    
    #La variable contador se incrementa al recibir cada topic
    x=x+1
    print(x)
    #Cuando la variable contador llega a 10 (datos a almacenar) se almacenan todos los valores juntos
    if x==10:
        
        try:
            db=pymysql.connect("IP","USER","PASS","DB") 
            cursor=db.cursor()
            cursor.execute(sql,(now,t,t_i,h,p,vv,dv,wr,pm25,pm10,aq)) 
            db.commit()
            print("guardado db")
            x=0
        except:
            db.rollback()
            print("fallo db")
            db.close()
            x=0

client = mqtt.Client()
client.on_connect=on_connect
client.on_message = on_message
client.connect("weatherlab.ddns.net") #Conexión a la IP del broker/host
try:
    client.loop_forever()
except KeyboardInterrupt:
    print("Cerrando...")
    db.close()
