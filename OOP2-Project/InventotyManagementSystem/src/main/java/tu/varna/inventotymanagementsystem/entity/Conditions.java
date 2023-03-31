package tu.varna.inventotymanagementsystem.entity;

public enum Conditions {
    NEW("New"),

    USED("Used"),

    DAMAGED("Damaged"),

    BROKEN("Broken"),

    REPAIRED("Repaired");

    private String condition;

    Conditions(String condition) {
        this.condition = condition;
    }

    public String getCondition() {
        return condition;
    }

    @Override
    public String toString() {
        return condition;
    }
}
