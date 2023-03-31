package bg.varna.util;

import bg.varna.tables.base.Table;
import bg.varna.tables.base.TableDeserializer;
import bg.varna.tables.impl.TableImpl;
import org.jdom2.Document;
import org.jdom2.Element;
import org.jdom2.JDOMException;
import org.jdom2.input.SAXBuilder;

import java.io.File;
import java.io.IOException;
import java.util.ArrayList;
import java.util.List;

public class XmlTableDeserializer<R, C, V> implements TableDeserializer<R, C, V> {

    @Override
    public Table<R, C, V> deserialize(String xml) throws IOException, JDOMException {
        SAXBuilder builder = new SAXBuilder();
        Document document = builder.build(new File(xml));
        Element root = document.getRootElement();

        List<Element> rowElements = root.getChildren("row");
        if (rowElements.isEmpty()) {
            throw new JDOMException("Invalid XML file format");
        }

        // Extract column keys from first row
        List<Element> columnElements = rowElements.get(0).getChildren("column");
        List<C> columnKeys = new ArrayList<>(columnElements.size());
        for (Element columnElement : columnElements) {
            C columnKey = (C) columnElement.getAttributeValue("key");
            columnKeys.add(columnKey);
        }

        // Extract values from all rows
        Table<R, C, V> table = new TableImpl<>();
        for (Element rowElement : rowElements) {
            R rowKey = (R) rowElement.getAttributeValue("key");
            List<Element> values = rowElement.getChildren("column");

            if (values.size() != columnKeys.size()) {
                throw new JDOMException("Invalid XML file format");
            }

            for (int i = 0; i < columnKeys.size(); i++) {
                C columnKey = columnKeys.get(i);
                V value = getValue(values.get(i));
                table.put(rowKey, columnKey, value);
            }
        }

        return table;
    }

    private V getValue(Element valueElement) throws JDOMException {
        String valueString = valueElement.getTextTrim();

        try {
            // Attempt to parse value as integer or double
            if (valueString.contains(".")) {
                return (V) Double.valueOf(valueString);
            } else {
                return (V) Integer.valueOf(valueString);
            }
        } catch (NumberFormatException e) {
            throw new JDOMException("Invalid XML file format");
        }
    }
}
