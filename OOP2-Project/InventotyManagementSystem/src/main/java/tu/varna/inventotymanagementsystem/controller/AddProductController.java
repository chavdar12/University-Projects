package tu.varna.inventotymanagementsystem.controller;

import javafx.fxml.FXML;
import javafx.scene.control.*;
import tu.varna.inventotymanagementsystem.entity.Conditions;
import tu.varna.inventotymanagementsystem.entity.ProductStatus;

public class AddProductController {

    @FXML
    private TextField inventoryNumberField;
    @FXML
    private TextField nameField;
    @FXML
    private TextArea descriptionField;
    @FXML
    private TextField pricePerItemField;
    @FXML
    private TextField quantityField;
    @FXML
    private DatePicker creationDateField;
    @FXML
    private DatePicker expirationDateField;
    @FXML
    private Button createProductField;
    @FXML
    private ComboBox<ProductStatus> statusBoxField;
    @FXML
    private ComboBox<Conditions> conditionBoxField;

    @FXML
    public void initialize() {
        statusBoxField.getItems().addAll(ProductStatus.values());
        conditionBoxField.getItems().addAll(Conditions.values());

        //inventory number field must be only numbers
        inventoryNumberField.textProperty().addListener((observable, oldValue, newValue) -> {
            onlyNumbers(newValue, inventoryNumberField);
        });

        //price per item field must be only numbers
        pricePerItemField.textProperty().addListener((observable, oldValue, newValue) -> {
            onlyNumbers(newValue, pricePerItemField);
        });

        //quantity field must be only numbers
        quantityField.textProperty().addListener((observable, oldValue, newValue) -> {
            onlyNumbers(newValue, quantityField);
        });

        //expiration date must be after creation date and creation date must be before expiration date
        expirationDateField.valueProperty().addListener((observable, oldValue, newValue) -> {
            if (newValue != null && creationDateField.getValue() != null) {
                if (newValue.isBefore(creationDateField.getValue())) {
                    expirationDateField.setStyle("-fx-border-color: red");
                    createProductField.setDisable(true);
                } else {
                    expirationDateField.setStyle("-fx-border-color: green");
                    createProductField.setDisable(false);
                }
            }
        });

        createProductField.setOnAction(
                event -> {
                    System.out.println("Inventory Number: " + inventoryNumberField.getText());
                    System.out.println("Name: " + nameField.getText());
                    System.out.println("Description: " + descriptionField.getText());
                    System.out.println("Price per item: " + pricePerItemField.getText());
                    System.out.println("Quantity: " + quantityField.getText());
                    System.out.println("Creation Date: " + creationDateField.getValue());
                    System.out.println("Expiration Date: " + expirationDateField.getValue());
                    System.out.println("Status: " + statusBoxField.getValue());
                    System.out.println("Condition: " + conditionBoxField.getValue());
                }
        );
    }

    private void onlyNumbers(String newValue, TextField inventoryNumberField) {
        if (!newValue.matches("\\d*")) {
            inventoryNumberField.setText(newValue.replaceAll("\\D", ""));
        }
    }
}
