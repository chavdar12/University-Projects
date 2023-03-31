package bg.varna.util;

import bg.varna.tables.base.Table;

public class TableHolder<T> {

    private static final TableHolder INSTANCE = new TableHolder();

    private Table<String, String, T> table;

    private TableHolder() {
        this.table = null;
    }

    public static TableHolder getInstance() {
        return INSTANCE;
    }

    public void setTable(Table<String, String, T> table) {
        this.table = table;
    }

    public Table<String, String, T> getTable() {
        return table;
    }

    public void clearTable() {
        this.table = null;
    }

}