package XML;

import org.xml.sax.Attributes;
import org.xml.sax.SAXException;
import org.xml.sax.helpers.DefaultHandler;

public class OpDisponibilitatHandler extends DefaultHandler {

    private OpDisponibilitat opdisp;
    private boolean tipo = false;
    private boolean fechaSalida = false;
    private boolean fechaEntrada = false;
    private boolean hotel = false;
    private boolean personas = false;
    private boolean reserva = false;
    private boolean tipohab = false;
    private boolean cantHab = false;
    private boolean cantPersonas = false;
    private boolean idCliente = false;

    public OpDisponibilitatHandler(OpDisponibilitat od) {
        super();
        opdisp = od;
    }

    public void startElement(String uri, String localName, String qName,
            Attributes attributes) throws SAXException {
        if (qName.equalsIgnoreCase("tipo")) {
            tipo = true;
        } else if (qName.equalsIgnoreCase("FechaInicio")) {
            fechaEntrada = true;
        } else if (qName.equalsIgnoreCase("FechaSalida")) {
            fechaSalida = true;
        } else if (qName.equalsIgnoreCase("Hotel")) {
            hotel = true;
        } else if (qName.equalsIgnoreCase("Personas")) {
            personas = true;
        } else if (qName.equalsIgnoreCase("reserva")) {
            reserva = true;
        } else if (qName.equalsIgnoreCase("cantPersonas")) {
            cantPersonas = true;
        } else if (qName.equalsIgnoreCase("TipoHab")) {
            tipohab = true;
        } else if (qName.equalsIgnoreCase("cantidad")) {
            cantHab = true;
        } else if (qName.equalsIgnoreCase("cliente")) {
            idCliente = true;
        }
    }

    public void endElement(String uri, String localName,
            String qName) throws SAXException {
        if (qName.equalsIgnoreCase("tipo")) {
            tipo = false;
            // opdisp.comprovarIntegritat();
        } else if (qName.equalsIgnoreCase("FechaSalida")) {
            fechaSalida = false;
        } else if (qName.equalsIgnoreCase("FechaInicio")) {
            fechaEntrada = false;
        } else if (qName.equalsIgnoreCase("Hotel")) {
            hotel = false;
        } else if (qName.equalsIgnoreCase("Personas")) {
            personas = false;
        } else if (qName.equalsIgnoreCase("reserva")) {
            reserva = false;
        } else if (qName.equalsIgnoreCase("cantPersonas")) {
            cantPersonas = false;
        } else if (qName.equalsIgnoreCase("TipoHab")) {
            tipohab = false;
        } else if (qName.equalsIgnoreCase("cantidad")) {
            cantHab = false;
        } else if (qName.equalsIgnoreCase("cliente")) {
            idCliente = false;
        }
    }

    public void characters(char ch[], int start, int length) throws SAXException {
        String pal = new String(ch, start, length);
        pal = pal.trim();
        if (tipo) {
            opdisp.setTipo(Integer.parseInt(pal));
        } else if (fechaSalida) {
            opdisp.setFechaSalida(pal);
        } else if (fechaEntrada) {
            opdisp.setFechaInicio(pal);
        } else if (hotel) {
            opdisp.setHotel(pal);
        } else if (personas) {
            opdisp.setPersonas(Integer.parseInt(pal));
        } else if (reserva) {

            if (cantPersonas) {
                opdisp.setCantPersonas(Integer.parseInt(pal));
            } else if (tipohab) {
                opdisp.setTipoHab(pal);
            } else if (cantHab) {
                opdisp.setCantHab(Integer.parseInt(pal));
            } else if (idCliente) {
                opdisp.setIdCliente(Integer.parseInt(pal));
            }

        }

    }

    public OpDisponibilitat getInfo() {
        return opdisp;
    }
}
