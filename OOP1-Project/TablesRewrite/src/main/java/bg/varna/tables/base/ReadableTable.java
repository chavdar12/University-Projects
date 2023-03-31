package bg.varna.tables.base;

import bg.varna.cells.base.Cell;

import java.util.Collection;
import java.util.Map;
import java.util.Set;

public interface ReadableTable<R, C, V> {
    boolean contains(R rowKey, C columnKey);

    boolean containsRow(R rowKey);

    boolean containsColumn(C columnKey);

    boolean containsValue(V value);

    V get(R rowKey, C columnKey);

    boolean isEmpty();

    int size();

    void clear();

    Map<C, V> row(R rowKey);

    Map<R, V> column(C columnKey);

    Set<Cell<R, C, V>> cellSet();

    Set<R> rowKeySet();

    Set<C> columnKeySet();

    Collection<V> values();
}