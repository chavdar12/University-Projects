package bg.varna.cells.impl;

import bg.varna.cells.base.Cell;

import java.util.Objects;

public record CellImpl<R, C, V>(R rowKey, C columnKey, V value) implements Cell<R, C, V> {

    @Override
    public boolean equals(Object obj) {
        if (obj == this) {
            return true;
        }
        if (!(obj instanceof Cell<?, ?, ?> other)) {
            return false;
        }
        return Objects.equals(rowKey, other.rowKey())
                && Objects.equals(columnKey, other.columnKey())
                && Objects.equals(value, other.value());
    }

    @Override
    public String toString() {
        return "Cell{" +
                "rowKey=" + rowKey +
                ", columnKey=" + columnKey +
                ", value=" + value +
                '}';
    }
}
