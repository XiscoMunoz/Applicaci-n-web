package XML;

import java.io.StringReader;
import javax.xml.parsers.SAXParser;
import javax.xml.parsers.SAXParserFactory;
import org.xml.sax.InputSource;
import BaseDatos.*;

public class ParserOpDisponibilitat {

    public String llegir(String ent) {
        OpDisponibilitat res = new OpDisponibilitat();
        Consulta consulta;
        Reserva reserva;
        try {
            SAXParserFactory factory = SAXParserFactory.newInstance();
            SAXParser saxParser = factory.newSAXParser();
            InputSource in = new InputSource(new StringReader(ent));
            OpDisponibilitatHandler handler = new OpDisponibilitatHandler(res);
            saxParser.parse(in, handler);
            res = handler.getInfo();
            if (res.getTipo() == 0) {
                consulta = new Consulta();
                return consulta.Consulta(res.getFechaInicio(), res.getFechaSalida(), res.getHotel());
            }
            if (res.getTipo() == 1) {
                reserva = new Reserva();
                return reserva.Reserva(res.getFechaInicio(),res.getFechaSalida(),res.getHotel(),res.getIdCliente(),res.getTipoHab(),res.getCantPersonas());
            }
            if (res.getTipo() == 2) {
                consulta = new Consulta();
                return consulta.ConsultaOta(res.getFechaInicio(), res.getFechaSalida(), res.getPersonas());
            }
            if (res.getTipo() == 3) {
                consulta = new Consulta();
                return consulta.ConsultaAndroid(res.getPersonas());
            }
            
        } catch (Exception e) {
            System.err.println(e.toString());
        }
        return "<xmlPractica><error> ERROR EN EL XML</error></xmlPractica>";
    }
}
