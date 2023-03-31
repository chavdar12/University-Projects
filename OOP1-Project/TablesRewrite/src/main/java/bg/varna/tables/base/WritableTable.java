package bg.varna.tables.base;

public interface WritableTable<R, C, V> {
    void put(R rowKey, C columnKey, V value);

    void putAll(Table<? extends R, ? extends C, ? extends V> table);

    void remove(R rowKey, C columnKey);
}