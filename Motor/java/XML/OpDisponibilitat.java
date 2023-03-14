package XML;

import java.util.ArrayList;

public class OpDisponibilitat {

    private String integritat;
    private String FechaInicio;
    private String FechaSalida;
    private String Hotel;
    private String tipoHab;
    private int personas;
    private int cantPersonas;
    private int cantHab;
    private int idCliente;
    private int tipo;


    public OpDisponibilitat() {

        FechaInicio = null;
        FechaSalida = null;
        tipoHab=null;
        tipo = -1;
        cantPersonas=-1;
        cantHab=-1;
        integritat = "Ok";
    }

    public String getIntegritat() {
        return integritat;
    }

    public int getIdCliente() {
        return idCliente;
    }

    public void setIdCliente(int idCliente) {
        this.idCliente = idCliente;
    }

    public void setIntegritat(String integritat) {
        this.integritat = integritat;
    }

    public String getFechaInicio() {
        return FechaInicio;
    }

    public String getTipoHab() {
        return tipoHab;
    }

    public void setTipoHab(String tipoHab) {
        this.tipoHab = tipoHab;
    }

    public int getCantPersonas() {
        return cantPersonas;
    }

    public void setCantPersonas(int cantPersonas) {
        this.cantPersonas = cantPersonas;
    }

    public int getCantHab() {
        return cantHab;
    }

    public void setCantHab(int cantHab) {
        this.cantHab = cantHab;
    }

    public void setFechaInicio(String FechaInicio) {
        this.FechaInicio = FechaInicio;
    }

    public String getFechaSalida() {
        return FechaSalida;
    }

    public void setFechaSalida(String FechaSalida) {
        this.FechaSalida = FechaSalida;
    }

    public String getHotel() {
        return Hotel;
    }

    public void setHotel(String Hotel) {
        this.Hotel = Hotel;
    }

    public int getPersonas() {
        return personas;
    }

    public void setPersonas(int personas) {
        this.personas = personas;
    }

    public int getTipo() {
        return tipo;
    }

    public void setTipo(int tipo) {
        this.tipo = tipo;
    }



 

    public void comprovarIntegritat() {
        if (FechaInicio == null) {
            integritat = integritat + "Error al dni\n";
        }
        if (FechaSalida == null) {
            integritat = integritat + "Error a la data\n";
        }
        if (Hotel == null) {
            integritat = integritat + "Error al hotel\n";
        }
        if (tipo <= 0) {
            integritat = integritat + "Error al número de nits\n";
        }
        if (!(integritat.contentEquals("Ok"))) {
            integritat = integritat.substring(2);
        }
    }

    @Override
    public String toString() {
        String res = "";
        if (integritat.contentEquals("Ok")) {
            res = res + "DNI: " + FechaInicio + "\n";
            res = res + "data: " + FechaSalida + "\n";
            res = res + "Número de nits: " + tipo + "\n";
        } else {
            res = integritat;
        }
        return res;
    }

    public String imprimirHTML() {
        String res = toString();
        res = res.replaceAll("\n", "\n<br/>");
        return res;
    }
}
