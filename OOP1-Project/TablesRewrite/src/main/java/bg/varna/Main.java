package bg.varna;

import bg.varna.menus.impl.CloseAction;
import bg.varna.menus.impl.Menu;
import bg.varna.menus.impl.OpenAction;
import bg.varna.menus.impl.OpenFileAction;
import bg.varna.tables.base.Table;
import bg.varna.tables.base.TableDeserializer;
import bg.varna.tables.base.TableSerializer;
import bg.varna.tables.impl.TableImpl;
import bg.varna.util.XmlTableDeserializer;
import bg.varna.util.XmlTableSerializer;
import org.jdom2.JDOMException;

import java.io.IOException;

public class Main {

    public static void main(String[] args) throws IOException, JDOMException {
      /*  Menu menu = new Menu();
        menu.addAction(new OpenAction());
        menu.addAction(new CloseAction(new OpenFileAction()));

        menu.run();*/

        Table<String, String, Double> table = new TableImpl<>();
        table.put("1", "1", 1.0);
        table.put("1", "2", 2.0);
        table.put("1", "3", 3.0);

        TableSerializer<String, String, Double> serializer = new XmlTableSerializer<>("C:\\Users\\chavdar\\Documents" +
                "\\Projects\\IdeaProjects\\TablesRewrite\\src\\main\\resources\\table.xml");
        serializer.serialize(table);

        TableDeserializer<String, String, Double> deserializer = new XmlTableDeserializer<>();
        Table<String, String, Double> table1 = deserializer.deserialize("C:\\Users\\chavdar\\Documents" +
                "\\Projects\\IdeaProjects\\TablesRewrite\\src\\main\\resources\\table.xml");

        System.out.println(table1);


    }
}
