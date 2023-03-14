import mysql.connector

db=mysql.connector.connect(
host="localhost",
user="root",
password="",
database="pms43480416c"
)
cursor=db.cursor()


def consulta(select):
    global cursor
    cursor.execute(select)
    return cursor.fetchall()

def modificacion(modi):
    global cursor
    cursor.execute(modi)
    db.commit()


