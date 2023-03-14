import tkinter as tk
import Conexion as con

#FUNCION QUE PUEDE HCER UNA MODIFICACION A UN CLIENTE O RESERVA Y QUE PUEDE  INSERTAR VALORES A ESTAS TABLAS
#EL PARAMETEO A ES LA INSTRUCCION A REALIZAR
#EL PARAMETRO B NOS INDICA SI ES PARA UN CLIENTE O UNA RESERVA
#EL PARAMETRO C NOS INDICA SI ES UN INSERT O UNA MODIFICACION
def FuncionesCliRe(a,b,c):
    texto=" "

    auxx = tk.Tk()
    if c:
        if b:

            con.modificacion(a)
            resultado=con.consulta("select count(idCliente)FROM cliente")
            for x in resultado:
                texto=x[0]
            auxiliar ="TU ID DE CLIENTE ES :"
            etiqueta = tk.Label(auxx,text='{}{}'.format(auxiliar,texto))
        else:

            con.modificacion(a)
            resultado=con.consulta("select Max(idReserva)FROM reserva")
            for x in resultado:
                texto=x[0]
            auxiliar ="TU ID DE Reserva ES :"
            etiqueta = tk.Label(auxx,text='{}{}'.format(auxiliar,texto))
    else:
        con.modificacion(a)
        etiqueta = tk.Label(auxx,text="MODIFICACION REALIZADA")


    vacio1 = tk.Label(auxx,text="-------------------------------")
    vacio2 = tk.Label(auxx,text=" ------------------------------")

    vacio1.pack()
    etiqueta.pack()
    vacio2.pack()





#FUNCIO QUE NOS CREA AL VENTANA PRA PODER HACER UN INSERT DEL CLIENTE
def InsertarCliente():
    amaga()
    destrueixCliente()
    lab1 = tk.Label(fcliins, text="Nom")
    lab2 = tk.Label(fcliins, text="Llinatges")
    lab3 = tk.Label(fcliins, text="DNI")
    ent1 = tk.Entry(fcliins)
    ent2 = tk.Entry(fcliins)
    ent3 = tk.Entry(fcliins)

#FUNCION DEL BOTON QUE ENVIA LA FUNCION QE QUIERES HACER
    boto = tk.Button(fcliins, text="Inserir", command = lambda: FuncionesCliRe("insert into Cliente (datosPersonales) VALUES ('"+ent1.get()+" "+ent2.get()+" "+ent3.get()+"')",True,True) )

    lab1.grid(row=1, column=1)
    ent1.grid(row=1, column=2)
    lab2.grid(row=2, column=1)
    ent2.grid(row=2, column=2)
    lab3.grid(row=3, column=1)
    ent3.grid(row=3, column=2)
    boto.grid(row=4, column=2)

    fcliins.pack()


#FUNCION QUE NOS CREA LA VENTANA DE MODIFICACION DE UN CLIENTE
def ModificarCliente():
    amaga()
    destrueixCliente()
    lab1 = tk.Label(fcliins, text="Nom")
    lab2 = tk.Label(fcliins, text="Llinatges")
    lab3 = tk.Label(fcliins, text="DNI")
    lab4 = tk.Label(fcliins, text="ID")
    ent1 = tk.Entry(fcliins)
    ent2 = tk.Entry(fcliins)
    ent3 = tk.Entry(fcliins)
    ent4 = tk.Entry(fcliins)
    boto = tk.Button(fcliins, text="Inserir", command = lambda: FuncionesCliRe("UPDATE Cliente SET datosPersonales = '"+ent1.get()+" "+ent2.get()+" "+ent3.get()+"' WHERE idCliente = '"+ent4.get()+"'",True,False) )

    lab1.grid(row=1, column=1)
    ent1.grid(row=1, column=2)
    lab2.grid(row=2, column=1)
    ent2.grid(row=2, column=2)
    lab3.grid(row=3, column=1)
    ent3.grid(row=3, column=2)
    lab4.grid(row=4, column=1)
    ent4.grid(row=4, column=2)
    boto.grid(row=5, column=2)

    fcliins.pack()

#FUNCION QUE NOS HACE LA VENTANA DE CONSULTA DE UN CLIENTE
def ConsultarCliente():
    amaga()
    destrueixCliente()
    lab1 = tk.Label(fcliins, text="ID")
    ent1 = tk.Entry(fcliins)
    boto = tk.Button(fcliins, text="Inserir", command = lambda: FuncionConsultar(2,ent1.get(),0))

    lab1.grid(row=1, column=1)
    ent1.grid(row=1, column=2)
    boto.grid(row=2, column=2)


    fcliins.pack()
#FUNCION QUE NOS HACE LA VENTANA DE CONSULTA DE UNA RESERVA
def ConsultarConsulta():
    amaga()
    destrueixConsulta()
    lab1 = tk.Label(frescon, text="ID")
    ent1 = tk.Entry(frescon)
    boto = tk.Button(frescon, text="Inserir", command = lambda:FuncionConsultar(1,ent1.get(),0) )

    lab1.grid(row=1, column=1)
    ent1.grid(row=1, column=2)
    boto.grid(row=2, column=2)

    frescon.pack()



#FUNCION QUE NOS CREA LA VENTANA PARA LA CONSULTA DE LAS HABITACIONES
def ConsultaHabitaciones():
    amaga()
    lab1 = tk.Label(fhabitacion, text="Tipo")
    ent1 = tk.Entry(fhabitacion)
    lab2 = tk.Label(fhabitacion, text="Hotel")
    ent2 = tk.Entry(fhabitacion)
    boto = tk.Button(fhabitacion, text="Inserir", command = lambda:FuncionConsultar(5,ent1.get(),ent2.get()) )

    lab1.grid(row=1, column=1)
    ent1.grid(row=1, column=2)
    lab2.grid(row=2, column=1)
    ent2.grid(row=2, column=2)
    boto.grid(row=3, column=2)

    fhabitacion.pack()


#FUNCIONES QUE ELIMINAN LOS EELEMENTOS DE UNA VENTANA
def destrueixCliente():
    for widget in fcliins.winfo_children():
        widget.destroy()

def destrueixConsulta():
    for widget in frescon.winfo_children():
        widget.destroy()

def amaga():
    fresins.pack_forget()
    frescon.pack_forget()
    fcliins.pack_forget()
    fhabitacion.pack_forget()

#FUNCION QUE NOS HACE LA VENTAN PARA INSERTAR UNA CONSULTA
def InsertarConsulta():
    amaga()
    destrueixConsulta()
    lab1 = tk.Label(frescon, text="Personas")
    lab3 = tk.Label(frescon, text="Fecha Inicio")
    lab4 = tk.Label(frescon, text="Fecha Final")
    lab5 = tk.Label(frescon, text="Hotel")
    lab6 = tk.Label(frescon, text="Tipo Habitacion")
    lab7 = tk.Label(frescon, text="Id Cliente")
    ent1 = tk.Entry(frescon)
    ent3 = tk.Entry(frescon)
    ent4 = tk.Entry(frescon)
    ent5 = tk.Entry(frescon)
    ent6 = tk.Entry(frescon)
    ent7 = tk.Entry(frescon)

    boto = tk.Button(frescon, text="Inserir", command = lambda: FuncionesCliRe("insert into Reserva (cantidadPersonas,FechaEntada,FechaSalida,idCliente,idHotel,codigo) VALUES ('"+ent1.get()+"','"+ent3.get()+"','"+ent4.get()+"','"+ent7.get()+"','"+ent5.get()+"','"+ent6.get()+"')",False,True))

    lab1.grid(row=1, column=1)
    ent1.grid(row=1, column=2)
    lab3.grid(row=3, column=1)
    ent3.grid(row=3, column=2)
    lab4.grid(row=4, column=1)
    ent4.grid(row=4, column=2)
    lab5.grid(row=5, column=1)
    ent5.grid(row=5, column=2)
    lab6.grid(row=6, column=1)
    ent6.grid(row=6, column=2)
    lab7.grid(row=7, column=1)
    ent7.grid(row=7, column=2)



    boto.grid(row=8, column=2)

    frescon.pack()
#FUNCION QUE NOS HACE LA VENTAN PARA MODIFICAR UNA CONSULTA
def ModificarConsulta():
    amaga()
    destrueixConsulta()
    lab1 = tk.Label(frescon, text="Personas")
    lab3 = tk.Label(frescon, text="Fecha Inicio")
    lab4 = tk.Label(frescon, text="Fecha Final")
    lab5 = tk.Label(frescon, text="Hotel")
    lab6 = tk.Label(frescon, text="Tipo Habitacion")
    lab7 = tk.Label(frescon, text="Id Cliente")
    lab8 = tk.Label(frescon, text="Id Consulta")
    ent1 = tk.Entry(frescon)
    ent3 = tk.Entry(frescon)
    ent4 = tk.Entry(frescon)
    ent5 = tk.Entry(frescon)
    ent6 = tk.Entry(frescon)
    ent7 = tk.Entry(frescon)
    ent8 = tk.Entry(frescon)
    boto = tk.Button(frescon, text="Inserir", command = lambda: FuncionesCliRe("UPDATE Reserva SET cantidadPersonas ='"+ent1.get()+"',FechaEntada='"+ent3.get()+"',FechaSalida='"+ent4.get()+"', idCliente='"+ent7.get()+"', idHotel='"+ent5.get()+"', codigo='"+ent6.get()+"' WHERE idReserva = '"+ent8.get()+"'",False,False) )

    lab1.grid(row=1, column=1)
    ent1.grid(row=1, column=2)
    lab3.grid(row=3, column=1)
    ent3.grid(row=3, column=2)
    lab4.grid(row=4, column=1)
    ent4.grid(row=4, column=2)
    lab5.grid(row=5, column=1)
    ent5.grid(row=5, column=2)
    lab6.grid(row=6, column=1)
    ent6.grid(row=6, column=2)
    lab7.grid(row=7, column=1)
    ent7.grid(row=7, column=2)
    lab8.grid(row=8, column=1)
    ent8.grid(row=8, column=2)



    boto.grid(row=9, column=2)

    frescon.pack()

def Consultar(a):

    destrueixCliente()

    lab1 = tk.Label(fcliins, text="ID")
    ent1 = tk.Entry(fcliins)
    boto = tk.Button(fcliins, text="Inserir", command = lambda:   insereixclient(ent1.get(), ent2.get()))

    lab1.grid(row=1, column=1)
    ent1.grid(row=1, column=2)
    boto.grid(row=2, column=2)


    fcliins.pack()

#FUNCION PARA HACER CONSULTAS
#EL PARAMETRO A NOS DICE QUE TABLA QUIERES HACER LA CONSULTA
#EL PARAMETRO B NOS INIDICA EL ID SI ES NECESARIO
#EL PARAMETRO C NOS INDICA UN SEGUNDO ID SI ES NECESARIO
def FuncionConsultar(a,b,c):

    auxx = tk.Tk()

    if a==1:
        resultado=con.consulta("select *FROM reserva where idReserva='"+b+"'")
        for x in resultado:
            texto=x[0]
        resultado=x
        auxiliar ="Datos de la reserva :"
        etiqueta = tk.Label(auxx,text='{}\n Personas{}\n Fecha de salida:{}\n Fecha de vuelta{}\n Cliente:{}\n Hotel:{} \n Tipo de Habitacion:{}'.format(auxiliar,resultado[0],resultado[1],resultado[2],resultado[3],resultado[5],resultado[6]))

    if a==2:
        resultado=con.consulta("select *FROM cliente where idCliente='"+b+"'")
        for x in resultado:
            texto=x[0]
        resultado=x
        auxiliar ="Datos del cliente :"
        etiqueta = tk.Label(auxx,text='{}\n{} '.format(auxiliar,resultado[1]))

    if a==3:
        linia=""
        resultado=con.consulta("select *FROM hotel ")
        for x in resultado:
            linia='{}\n ID: {} Descripcion: {} URl: {} Nombre: {}'.format(linia,x[0],x[1],x[2],x[3])
        auxiliar ="Hoteles :"
        etiqueta = tk.Label(auxx,text='{}\n{} '.format(auxiliar,linia))
    if a==4:
        linia=""
        resultado=con.consulta("select *FROM tipohabitacion " )
        for x in resultado:

            linia='{}\n Codigo: {} Descripcion: {} '.format(linia,x[0],x[1])
        auxiliar ="Tipos de habitaciones:"
        etiqueta = tk.Label(auxx,text='{}\n{} '.format(auxiliar,linia))
    if a==5:
        resultado=con.consulta("select *FROM r_hotel_habitacion where codigo='"+b+"' and idHotel='"+c+"'")
        for x in resultado:
            texto=x[0]
        resultado=x
        auxiliar ="Habitacones disponibles :"
        etiqueta = tk.Label(auxx,text='{}\n Hotel: {} Tipo Habitacion: {} Libres: {} Precio: {} '.format(auxiliar,resultado[0],resultado[1],resultado[3],resultado[2]))


    vacio1 = tk.Label(auxx,text="-------------------------------")
    vacio2 = tk.Label(auxx,text=" ------------------------------")

    vacio1.pack()
    etiqueta.pack()
    vacio2.pack()




# VENTANA PRINCIPAL
pms = tk.Tk()
pms.geometry("400x400")


barra = tk.Menu(pms)
pms.config(menu=barra)


opreserva = tk.Menu(barra, tearoff=0 )

opclients = tk.Menu(barra, tearoff=0)

ophoteles = tk.Menu(barra, tearoff=0 )

optipoH = tk.Menu(barra, tearoff=0)

opHab = tk.Menu(barra, tearoff=0 )

barra.add_cascade(label="Reserves", menu=opreserva)
barra.add_cascade(label="Clients", menu=opclients)

barra.add_cascade(label="Hoteles", menu=ophoteles)
barra.add_cascade(label="Tipos de habitacion", menu=optipoH)

barra.add_cascade(label="Habitaciones", menu=opHab)


#CREAMOS LAS OPCIONES DE LA RESERVA Y LES ASIGNAMOS UNA FUNCION
opreserva.add_command(label="Inserir", command = lambda: InsertarConsulta())
opreserva.add_command(label="Consulta", command = lambda: ConsultarConsulta())
opreserva.add_command(label="Modificar", command = lambda: ModificarConsulta())

#CREAMOS LAS OPCIONES DE LOS CLIENTES Y LES ASIGNAMOS UNA FUNCION
opclients.add_command(label="Inserir", command = lambda: InsertarCliente())
opclients.add_command(label="Consulta",command = lambda: ConsultarCliente())
opclients.add_command(label="Modificar",command = lambda: ModificarCliente())

#CREAMOS LAS OPCIONES DE LOS HOTELES Y LES ASIGNAMOS UNA FUNCION
ophoteles.add_command(label="Consultar",command=lambda:FuncionConsultar(3,0,0))

#CREAMOS LA OPCION PARA VER LOS DIFERENTES TIPOS DE HABITACIONES
optipoH.add_command(label="Consultar",command=lambda:FuncionConsultar(4,0,0))

#CREAMOS LAS OPCIONES DE LAS HABITACIONES Y LES ASIGNAMOS UNA FUNCION
opHab.add_command(label="Consultar",command=lambda:ConsultaHabitaciones())




# FRAMES DE LAS DIFERENTES OPCIONES
fresins = tk.Frame(pms)
frescon = tk.Frame(pms)
fcliins = tk.Frame(pms)
fhabitacion= tk.Frame(pms)

pms.mainloop()
