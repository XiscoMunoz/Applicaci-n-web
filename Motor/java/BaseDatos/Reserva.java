/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package BaseDatos;

import java.sql.Date;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.Statement;

/**
 *
 * @author Usuario
 */
public class Reserva {

    public String Reserva(String fechaEntrada, String fechaSalida, String hotel, int idCliente, String codigo, int cantPersonas) {
        Conexion con = new Conexion();
        String sql = "INSERT INTO `reserva`(`cantidadPersonas`, `FechaEntada`, `FechaSalida`,`idCliente`, `idHotel`, `codigo`) VALUES(?, ?, ?, ?, ?, ?)";
        try {
            con.open();
            PreparedStatement ps = con.getConection().prepareStatement(sql);
            ps.setInt(1, cantPersonas);
            
            ps.setDate(2, Date.valueOf(fechaEntrada));
            ps.setDate(3, Date.valueOf(fechaSalida));
            ps.setInt(4, idCliente);
            ps.setString(5, hotel);
            ps.setString(6, codigo);
            String aux=ps.toString();
            ps.executeUpdate();

        } catch (Exception ex) {
            ex.printStackTrace();
        } finally {
            con.close();
        }
        return "<xmlPractica><respuesta>ok</respuesta></xmlPractica>";
    }
}
