package tu.varna.inventotymanagementsystem.controller;

import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import tu.varna.inventotymanagementsystem.entity.Conditions;
import tu.varna.inventotymanagementsystem.entity.Product;
import tu.varna.inventotymanagementsystem.entity.ProductBuilder;
import tu.varna.inventotymanagementsystem.entity.ProductStatus;

import java.time.LocalDate;

public class UserDashboardController {
    @FXML
    private TableColumn<Product, Long> inventoryNumberCol;
    @FXML
    private TableColumn<Product, String> nameCol;
    @FXML
    private TableColumn<Product, Integer> quantityCol;
    @FXML
    private TableColumn<Product, Double> pricePerUnitCol;
    @FXML
    private TableColumn<Product, Double> totalValueCol;
    @FXML
    private TableColumn<Product, ProductStatus> statusCol;
    @FXML
    private TableColumn<Product, Conditions> conditionCol;
    @FXML
    private TableColumn<Product, LocalDate> creationDateCol;
    @FXML
    private TableColumn<Product, LocalDate> expirationDateCol;
    @FXML
    private TableView<Product> expiredIItemsTable;
    @FXML
    private Label firstNameLabel;
    @FXML
    private Label lastNameLabel;
    @FXML
    private Label emailLabel;
    @FXML
    private Button addNewItemButton;
    @FXML
    private TableView<Product> allItemsTable;

    @FXML
    private void initialize() {
        ObservableList<Product> products = FXCollections.observableArrayList(
                ProductBuilder.aProduct()
                        .withInventoryNumber(1L)
                        .withName("Product 1")
                        .withQuantity(10)
                        .withPrice(10.0)
                        .withTotalPrice(100.0)
                        .withStatus(ProductStatus.AVAILABLE)
                        .withCondition(Conditions.NEW)
                        .withDateOfCreation(LocalDate.now())
                        .withExpirationDate(LocalDate.now().plusDays(10))
                        .build(),
                ProductBuilder.aProduct()
                        .withInventoryNumber(2L)
                        .withName("Product 2")
                        .withQuantity(10)
                        .withPrice(10.0)
                        .withTotalPrice(100.0)
                        .withStatus(ProductStatus.NOT_AVAILABLE)
                        .withCondition(Conditions.NEW)
                        .withDateOfCreation(LocalDate.now())
                        .withExpirationDate(LocalDate.now().plusDays(10))
                        .build(),
                ProductBuilder.aProduct()
                        .withInventoryNumber(3L)
                        .withName("Product 3")
                        .withQuantity(10)
                        .withPrice(10.0)
                        .withTotalPrice(100.0)
                        .withStatus(ProductStatus.AVAILABLE)
                        .withCondition(Conditions.NEW)
                        .withDateOfCreation(LocalDate.now())
                        .withExpirationDate(LocalDate.now().plusDays(10))
                        .build()
        );


        //fill columns using products
        inventoryNumberCol.setCellValueFactory(cellData -> cellData.getValue().inventoryNumberProperty());
        nameCol.setCellValueFactory(cellData -> cellData.getValue().nameProperty());
        quantityCol.setCellValueFactory(cellData -> cellData.getValue().quantityProperty());
        pricePerUnitCol.setCellValueFactory(cellData -> cellData.getValue().priceProperty());
        totalValueCol.setCellValueFactory(cellData -> cellData.getValue().totalPriceProperty());
        statusCol.setCellValueFactory(cellData -> cellData.getValue().statusProperty());
        conditionCol.setCellValueFactory(cellData -> cellData.getValue().conditionProperty());
        creationDateCol.setCellValueFactory(cellData -> cellData.getValue().dateOfCreationProperty());
        expirationDateCol.setCellValueFactory(cellData -> cellData.getValue().expirationDateProperty());

        allItemsTable.setItems(products);

        //change first name last name and email labels
        firstNameLabel.setText("Chavdar");
        lastNameLabel.setText("Shishkov");
        emailLabel.setText("chavdar@gmail.com");
    }
}
