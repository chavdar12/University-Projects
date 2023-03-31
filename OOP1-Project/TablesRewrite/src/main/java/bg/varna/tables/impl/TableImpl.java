package bg.varna.tables.impl;

import bg.varna.cells.base.Cell;
import bg.varna.cells.impl.CellImpl;
import bg.varna.tables.base.Table;

import java.util.*;

public class TableImpl<R, C, V> implements Table<R, C, V> {

    private final Map<R, Map<C, V>> table;

    public TableImpl() {
        table = new LinkedHashMap<>();
    }

    @Override
    public boolean contains(R rowKey, C columnKey) {
        Map<C, V> rowMap = table.get(rowKey);
        return rowMap != null && rowMap.containsKey(columnKey);
    }

    @Override
    public boolean containsRow(R rowKey) {
        return table.containsKey(rowKey);
    }

    @Override
    public boolean containsColumn(C columnKey) {
        for (Map<C, V> row : table.values()) {
            if (row.containsKey(columnKey)) {
                return true;
            }
        }
        return false;
    }

    @Override
    public boolean containsValue(V value) {
        for (Map<C, V> row : table.values()) {
            if (row.containsValue(value)) {
                return true;
            }
        }
        return false;
    }

    @Override
    public V get(R rowKey, C columnKey) {
        Map<C, V> rowMap = table.get(rowKey);
        return rowMap != null ? rowMap.get(columnKey) : null;
    }

    @Override
    public boolean isEmpty() {
        return table.isEmpty();
    }

    @Override
    public int size() {
        int size = 0;
        for (Map<C, V> rowMap : table.values()) {
            size += rowMap.size();
        }
        return size;
    }

    @Override
    public void clear() {
        table.clear();
    }

    @Override
    public Map<C, V> row(R rowKey) {
        return table.get(rowKey);
    }

    @Override
    public Map<R, V> column(C columnKey) {
        Map<R, V> columnMap = new LinkedHashMap<>();
        for (Map.Entry<R, Map<C, V>> entry : table.entrySet()) {
            Map<C, V> rowMap = entry.getValue();
            V value = rowMap.get(columnKey);
            if (value != null || rowMap.containsKey(columnKey)) {
                columnMap.put(entry.getKey(), value);
            }
        }
        return columnMap;
    }

    @Override
    public Set<Cell<R, C, V>> cellSet() {
        Set<Cell<R, C, V>> cellSet = new HashSet<>();
        for (R rowKey : table.keySet()) {
            Map<C, V> rowMap = table.get(rowKey);
            for (C columnKey : rowMap.keySet()) {
                cellSet.add(new CellImpl<>(rowKey, columnKey, rowMap.get(columnKey)));
            }
        }
        return cellSet;
    }

    @Override
    public Set<R> rowKeySet() {
        return table.keySet();
    }

    @Override
    public Set<C> columnKeySet() {
        Set<C> columnSet = new HashSet<>();
        for (Map<C, V> rowMap : table.values()) {
            columnSet.addAll(rowMap.keySet());
        }
        return columnSet;
    }

    @Override
    public Collection<V> values() {
        Collection<V> values = new ArrayList<>();
        for (Map<C, V> rowMap : table.values()) {
            values.addAll(rowMap.values());
        }
        return values;
    }

    @Override
    public Map<R, Map<C, V>> rowMap() {
        return table;
    }

    @Override
    public Map<C, Map<R, V>> columnMap() {
        Map<C, Map<R, V>> columnMap = new LinkedHashMap<>();
        for (R rowKey : table.keySet()) {
            Map<C, V> rowMap = table.get(rowKey);
            for (C columnKey : rowMap.keySet()) {
                if (!columnMap.containsKey(columnKey)) {
                    columnMap.put(columnKey, new LinkedHashMap<>());
                }
                columnMap.get(columnKey).put(rowKey, rowMap.get(columnKey));
            }
        }
        return columnMap;
    }

    @Override
    public void put(R rowKey, C columnKey, V value) {
        if (!table.containsKey(rowKey)) {
            table.put(rowKey, new LinkedHashMap<>());
        }
        table.get(rowKey).put(columnKey, value);
    }

    @Override
    public void putAll(Table<? extends R, ? extends C, ? extends V> table) {
        for (Cell<? extends R, ? extends C, ? extends V> cell : table.cellSet()) {
            put(cell.rowKey(), cell.columnKey(), cell.value());
        }
    }

    @Override
    public void remove(R rowKey, C columnKey) {
        if (contains(rowKey, columnKey)) {
            table.get(rowKey).remove(columnKey);
        }
    }

    /*@Override
    public String toString() {
        StringBuilder sb = new StringBuilder();

        // Get column headers
        Set<C> columnKeys = columnKeySet();

        // Header row
        sb.append("+------+");
        for (C columnKey : columnKeys) {
            sb.append(String.format("-%6s-+", "").replace(' ', '-'));
        }
        sb.append("\n");

        // Column headers
        sb.append("|      |");
        for (C columnKey : columnKeys) {
            sb.append(String.format(" %6s |", columnKey));
        }
        sb.append("\n");

        // Separator row
        sb.append("+------+");
        for (C columnKey : columnKeys) {
            sb.append(String.format("-%6s-+", "").replace(' ', '-'));
        }
        sb.append("\n");

        // Data rows
        for (R rowKey : rowKeySet()) {
            sb.append(String.format("|%-6s|", rowKey));
            Map<C, V> row = row(rowKey);
            for (C columnKey : columnKeys) {
                V value = row.get(columnKey);
                sb.append(String.format(" %6s |", value != null ? value : ""));
            }
            sb.append("\n");

            sb.append("+------+");
            for (C columnKey : columnKeys) {
                sb.append(String.format("-%6s-+", "").replace(' ', '-'));
            }
            sb.append("\n");
        }

        return sb.toString();
    }*/
    @Override
    public String toString() {
        StringBuilder sb = new StringBuilder();

        // Get column headers
        Set<C> columnKeys = columnKeySet();

        // Get maximum width of values in each column
        int[] columnWidths = new int[columnKeys.size()];
        Arrays.fill(columnWidths, 1); // minimum width of 1
        for (R rowKey : rowKeySet()) {
            Map<C, V> row = row(rowKey);
            int columnIndex = 0;
            for (C columnKey : columnKeys) {
                V value = row.get(columnKey);
                if (value != null) {
                    int valueWidth = value.toString().length();
                    columnWidths[columnIndex] = Math.max(columnWidths[columnIndex], valueWidth);
                }
                columnIndex++;
            }
        }

        // Header row
        sb.append("+------+");
        int columnIndex = 0;
        for (C columnKey : columnKeys) {
            int columnWidth = columnWidths[columnIndex++];
            sb.append(String.format("%" + (columnWidth + 2) + "s+", "").replace(' ', '-'));
        }
        sb.append("\n");

        // Column headers
        sb.append("|      |");
        columnIndex = 0;
        for (C columnKey : columnKeys) {
            int columnWidth = columnWidths[columnIndex++];
            sb.append(String.format(" %-" + columnWidth + "s |", columnKey));
        }
        sb.append("\n");

        // Separator row
        sb.append("+------+");
        columnIndex = 0;
        for (C columnKey : columnKeys) {
            int columnWidth = columnWidths[columnIndex++];
            sb.append(String.format("%" + (columnWidth + 2) + "s+", "").replace(' ', '-'));
        }
        sb.append("\n");

        // Data rows
        for (R rowKey : rowKeySet()) {
            sb.append(String.format("|%-6s|", rowKey));
            Map<C, V> row = row(rowKey);
            columnIndex = 0;
            for (C columnKey : columnKeys) {
                int columnWidth = columnWidths[columnIndex++];
                V value = row.get(columnKey);
                if (value != null) {
                    String formattedValue = String.format(" %" + columnWidth + "s ", value);
                    sb.append(String.format("%s|", formattedValue));
                } else {
                    sb.append(String.format("%" + (columnWidth + 2) + "s|", ""));
                }
            }
            sb.append("\n");

            // Separator row
            sb.append("+------+");
            columnIndex = 0;
            for (C columnKey : columnKeys) {
                int columnWidth = columnWidths[columnIndex++];
                sb.append(String.format("%" + (columnWidth + 2) + "s+", "").replace(' ', '-'));
            }
            sb.append("\n");
        }

        return sb.toString();
    }
}
