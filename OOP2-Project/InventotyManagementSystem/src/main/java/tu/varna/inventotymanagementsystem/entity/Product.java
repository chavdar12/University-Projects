package tu.varna.inventotymanagementsystem.entity;

import javafx.beans.property.*;
import javafx.beans.value.ObservableValue;

import javax.persistence.*;
import java.time.LocalDate;

@Entity
@Table(name = "products")
public class Product extends BaseEntity {

    @ManyToOne(fetch = FetchType.LAZY, cascade = CascadeType.ALL)
    private UserProfile userProfile;
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

    public Product(
            Long inventoryNumber,
            String name,
            String description,
            Types type,
            ProductStatus status,
            Double price,
            Double totalPrice,
            Double userPrice,
            Integer quantity,
            Conditions condition,
            LocalDate dateOfCreation,
            LocalDate expirationDate,
            Boolean isExpired) {
        this.inventoryNumber = inventoryNumber;
        this.name = name;
        this.description = description;
        this.type = type;
        this.status = status;
        this.price = price;
        this.totalPrice = totalPrice;
        this.userPrice = userPrice;
        this.quantity = quantity;
        this.condition = condition;
        this.dateOfCreation = dateOfCreation;
        this.expirationDate = expirationDate;
        this.isExpired = isExpired;
    }

    public Product() {
    }

    public UserProfile getUserProfile() {
        return userProfile;
    }

    public void setUserProfile(UserProfile userProfile) {
        this.userProfile = userProfile;
    }

    public Long getInventoryNumber() {
        return inventoryNumber;
    }

    public void setInventoryNumber(Long inventoryNumber) {
        this.inventoryNumber = inventoryNumber;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public Types getType() {
        return type;
    }

    public void setType(Types type) {
        this.type = type;
    }

    public ProductStatus getStatus() {
        return status;
    }

    public void setStatus(ProductStatus status) {
        this.status = status;
    }

    public Double getPrice() {
        return price;
    }

    public void setPrice(Double price) {
        this.price = price;
    }

    public Double getTotalPrice() {
        return totalPrice;
    }

    public void setTotalPrice(Double totalPrice) {
        this.totalPrice = totalPrice;
    }

    public Double getUserPrice() {
        return userPrice;
    }

    public void setUserPrice(Double userPrice) {
        this.userPrice = userPrice;
    }

    public Integer getQuantity() {
        return quantity;
    }

    public void setQuantity(Integer quantity) {
        this.quantity = quantity;
    }

    public Conditions getCondition() {
        return condition;
    }

    public void setCondition(Conditions condition) {
        this.condition = condition;
    }

    public LocalDate getDateOfCreation() {
        return dateOfCreation;
    }

    public void setDateOfCreation(LocalDate dateOfCreation) {
        this.dateOfCreation = dateOfCreation;
    }

    public LocalDate getExpirationDate() {
        return expirationDate;
    }

    public void setExpirationDate(LocalDate expirationDate) {
        this.expirationDate = expirationDate;
    }

    public Boolean getExpired() {
        return isExpired;
    }

    public void setExpired(Boolean expired) {
        isExpired = expired;
    }

    public ObservableValue<Long> inventoryNumberProperty() {
        return new SimpleLongProperty(inventoryNumber).asObject();
    }

    public ObservableValue<String> nameProperty() {
        return new SimpleStringProperty(name);
    }


    public ObservableValue<Integer> quantityProperty() {
        return new SimpleIntegerProperty(quantity).asObject();
    }

    public ObservableValue<Double> priceProperty() {
        return new SimpleDoubleProperty(price).asObject();
    }

    public ObservableValue<Double> totalPriceProperty() {
        return new SimpleDoubleProperty(totalPrice).asObject();
    }

    public ObservableValue<ProductStatus> statusProperty() {
        return new SimpleObjectProperty<>(status);
    }

    public ObservableValue<Conditions> conditionProperty() {
        return new SimpleObjectProperty<>(condition);
    }

    public ObservableValue<LocalDate> dateOfCreationProperty() {
        return new SimpleObjectProperty<>(dateOfCreation);
    }

    public ObservableValue<LocalDate> expirationDateProperty() {
        return new SimpleObjectProperty<>(expirationDate);
    }
}
