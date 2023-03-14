/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package BaseDatos;

import java.sql.Connection;
import java.sql.DriverManager;

/**
 *
 * @author Usuario
 */
public class Conexion {
    
    private Connection con;

    public Conexion() {
        con=null;
        
    }

    public void open() {
        try {
            Class.forName("com.mysql.jdbc.Driver");
            con = DriverManager.getConnection("jdbc:mysql://"
                    + Datos.host + ":" + Datos.port
                    + "/" + Datos.db, Datos.user, Datos.pass);
        } catch (Exception ex) {
            ex.getMessage();
        }
    }

    public void close() {
        try {
            con.close();
        } catch (Exception ex) {
            ex.printStackTrace();
        }
    }

    public Connection getConection() {
        return con;
    }
   
}
