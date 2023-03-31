package bg.varna.tables.base;

import java.io.IOException;

public interface TableSerializer<R, C, V> {
    String serialize(Table<R, C, V> table) throws IOException;
}