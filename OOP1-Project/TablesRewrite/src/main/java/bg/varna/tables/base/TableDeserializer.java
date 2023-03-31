package bg.varna.tables.base;

import org.jdom2.JDOMException;

import java.io.IOException;

public interface TableDeserializer<R, C, V> {
    Table<R, C, V> deserialize(String xml) throws IOException, JDOMException;
}
