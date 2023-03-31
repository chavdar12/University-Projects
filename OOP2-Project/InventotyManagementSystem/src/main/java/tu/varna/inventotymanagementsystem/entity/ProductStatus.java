package tu.varna.inventotymanagementsystem.entity;

public enum ProductStatus {
    AVAILABLE("Available"),
    NOT_AVAILABLE("Not available");

    private String status;

    ProductStatus(String status) {
        this.status = status;
    }

    public String getStatus() {
        return status;
    }

    @Override
    public String toString() {
        return status;
    }
}
