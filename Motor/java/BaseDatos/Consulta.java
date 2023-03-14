/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package BaseDatos;

import java.sql.ResultSet;
import java.sql.Statement;
import java.util.ArrayList;
import XML.*;

/**
 *
 * @author Usuario
 */
public class Consulta {

    public String Consulta(String fechaEntrada, String fechaSalida, String hotel) {
        Conexion con = new Conexion();
        String resultado = "<Resultado>"
                + "<FechaInicio>" + fechaEntrada + "</FechaInicio> \n"
                + "<FechaSalida>" + fechaSalida + "</FechaSalida> \n"
                + "<Hotel>" + hotel + "</Hotel> ";
        try {
            con.open();
            Statement st = con.getConection().createStatement();
            ResultSet rs = st.executeQuery("select * from r_hotel_habitacion where idhotel=" + hotel);
            String aux = "";
            while (rs.next()) {
                resultado = resultado+"<consulta>";
                
                 resultado = resultado+"<hotel>Hotel"+hotel+"</hotel>";
                 resultado = resultado+"<tipoHab>"+rs.getString("codigo")+"</tipoHab>";
                 resultado = resultado+"<cantidad>"+rs.getInt("cantidad")+"</cantidad>";
                 resultado = resultado+"<precio>"+rs.getInt("precio")+"</precio>";
                
                resultado = resultado+"</consulta>";
            }
            resultado = resultado+"</Resultado>";
        } catch (Exception ex) {
            ex.printStackTrace();
        } finally {
            con.close();
        }
        return resultado;
    }
    
    
    public String ConsultaOta(String fechaEntrada, String fechaSalida, int cantidad) { 

        Conexion con = new Conexion();
        String resultado = "<Resultado>"
                + "<FechaInicio>" + fechaEntrada + "</FechaInicio> \n"
                + "<FechaSalida>" + fechaSalida + "</FechaSalida> \n"
                ;
        try {
            con.open();
            Statement st = con.getConection().createStatement();
            ResultSet rs = st.executeQuery("select * from r_hotel_habitacion join tipohabitacion on r_hotel_habitacion .codigo=tipohabitacion.codigo and tipohabitacion.ocupacion=" + cantidad);
            String aux = "";
            while (rs.next()) {
                resultado = resultado+"<consulta>";
                
                 resultado = resultado+"<hotel>Hotel"+rs.getInt("idHotel")+"</hotel>";
                 resultado = resultado+"<tipoHab>"+rs.getString("codigo")+"</tipoHab>";
                 resultado = resultado+"<cantidad>"+rs.getInt("cantidad")+"</cantidad>";
                 resultado = resultado+"<precio>"+rs.getInt("precio")+"</precio>";
                
                resultado = resultado+"</consulta>";
            }
            resultado = resultado+"</Resultado>";
        } catch (Exception ex) {
            ex.printStackTrace();
        } finally {
            con.close();
        }
        return resultado;
    }
    
    
    public String ConsultaAndroid(int cantidad) {//Lo mismo que la ota
        Conexion con = new Conexion();
        String resultado = "";
        try {
            con.open();
            Statement st = con.getConection().createStatement();
            ResultSet rs = st.executeQuery("select * from r_hotel_habitacion join tipohabitacion on r_hotel_habitacion .codigo=tipohabitacion.codigo and tipohabitacion.ocupacion=" + cantidad);
            String aux = "";
            while (rs.next()) {
                
                
                 resultado = resultado+"Hotel"+rs.getInt("idHotel")+" ";
                 resultado = resultado+"TipoHab:"+rs.getString("codigo")+" ";
                 resultado = resultado+"Cantidad:"+rs.getInt("cantidad")+" ";
                 resultado = resultado+"Precio:"+rs.getInt("precio")+" ";
                 resultado = resultado+"                                                                        ";
                
            }
        } catch (Exception ex) {
            System.out.println(ex.toString()); 
        } finally {
            con.close();
        }
        return resultado;
    }
    

}
