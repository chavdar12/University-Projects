package bg.varna.tables.base;

import java.util.Map;

public interface Table<R, C, V> extends ReadableTable<R, C, V>, WritableTable<R, C, V> {
    Map<R, Map<C, V>> rowMap();

    Map<C, Map<R, V>> columnMap();
}