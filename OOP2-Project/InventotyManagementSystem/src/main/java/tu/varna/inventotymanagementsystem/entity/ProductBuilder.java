package tu.varna.inventotymanagementsystem.entity;

import java.time.LocalDate;

public final class ProductBuilder {
    private Long inventoryNumber;
    private String name;
    private String description;
    private Types type;
    private ProductStatus status;
    private Double price;
    private Double totalPrice;
    private Double userPrice;
    private Integer quantity;
    private Conditions condition;
    private LocalDate dateOfCreation;
    private LocalDate expirationDate;
    private Boolean isExpired;

    private ProductBuilder() {
    }

    public static ProductBuilder aProduct() {
        return new ProductBuilder();
    }

    public ProductBuilder withInventoryNumber(Long inventoryNumber) {
        this.inventoryNumber = inventoryNumber;
        return this;
    }

    public ProductBuilder withName(String name) {
        this.name = name;
        return this;
    }

    public ProductBuilder withDescription(String description) {
        this.description = description;
        return this;
    }

    public ProductBuilder withType(Types type) {
        this.type = type;
        return this;
    }

    public ProductBuilder withStatus(ProductStatus status) {
        this.status = status;
        return this;
    }

    public ProductBuilder withPrice(Double price) {
        this.price = price;
        return this;
    }

    public ProductBuilder withTotalPrice(Double totalPrice) {
        this.totalPrice = totalPrice;
        return this;
    }

    public ProductBuilder withUserPrice(Double userPrice) {
        this.userPrice = userPrice;
        return this;
    }

    public ProductBuilder withQuantity(Integer quantity) {
        this.quantity = quantity;
        return this;
    }

    public ProductBuilder withCondition(Conditions condition) {
        this.condition = condition;
        return this;
    }

    public ProductBuilder withDateOfCreation(LocalDate dateOfCreation) {
        this.dateOfCreation = dateOfCreation;
        return this;
    }

    public ProductBuilder withExpirationDate(LocalDate expirationDate) {
        this.expirationDate = expirationDate;
        return this;
    }

    public ProductBuilder withIsExpired(Boolean isExpired) {
        this.isExpired = isExpired;
        return this;
    }

    public Product build() {
        return new Product(inventoryNumber, name, description, type, status, price, totalPrice, userPrice, quantity, condition, dateOfCreation, expirationDate, isExpired);
    }
}
