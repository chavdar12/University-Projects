package bg.varna.util;

import bg.varna.tables.base.Table;
import bg.varna.tables.base.TableSerializer;
import org.jdom2.Document;
import org.jdom2.Element;
import org.jdom2.output.Format;
import org.jdom2.output.XMLOutputter;

import java.io.IOException;
import java.nio.file.Files;
import java.nio.file.Paths;

public class XmlTableSerializer<R, C, V> implements TableSerializer<R, C, V> {
    private final String filePath;

    public XmlTableSerializer(String filePath) {
        this.filePath = filePath;
    }

    @Override
    public String serialize(Table<R, C, V> table) throws IOException {
        Element root = new Element("table");
        for (R rowKey : table.rowKeySet()) {
            Element row = new Element("row");
            row.setAttribute("key", rowKey.toString());
            for (C columnKey : table.columnKeySet()) {
                Element column = new Element("column");
                column.setAttribute("key", columnKey.toString());
                V value = table.get(rowKey, columnKey);
                if (value != null) {
                    Element valueElement = new Element("value");
                    valueElement.setText(value.toString());
                    column.addContent(valueElement);
                }
                row.addContent(column);
            }
            root.addContent(row);
        }

        Document document = new Document(root);
        XMLOutputter out = new XMLOutputter(Format.getPrettyFormat());
        String xmlString = out.outputString(document);
        Files.write(Paths.get(filePath), xmlString.getBytes());
        return xmlString;
    }
}
