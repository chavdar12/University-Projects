package tu.varna.inventotymanagementsystem.controller;

import javafx.fxml.FXML;
import javafx.scene.control.Button;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;

public class RegisterViewController {
    @FXML
    private TextField firstNameField;
    @FXML
    private TextField lastNameField;
    @FXML
    private TextField emailField;
    @FXML
    private PasswordField passwordField;
    @FXML
    private PasswordField confirmPasswordField;
    @FXML
    private Button registerButton;
    @FXML
    private Button loginButton;

    @FXML
    private void initialize() {
        emailField.textProperty().addListener((observable, oldValue, newValue) ->
                changeColors(newValue.matches("\\S+@\\S+\\.\\S+"), emailField));

        passwordField.textProperty().addListener((observable, oldValue, newValue) ->
                changeColors(newValue.matches("^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=!])(?=\\S+$).{8,}$"), passwordField));

        confirmPasswordField.textProperty().addListener((observable, oldValue, newValue) ->
                changeColors(newValue.equals(passwordField.getText()), confirmPasswordField));

        //login button
        registerButton.setOnAction(event -> register());
        loginButton.setOnAction(event -> login());
    }

    private void login() {
        System.out.println("Login");
    }

    private void register() {
        System.out.println("Register");
    }

    private void changeColors(boolean value, TextField field) {
        if (!value) {
            field.setStyle("-fx-border-color: red");
        } else {
            field.setStyle("-fx-border-color: green");
        }
    }
}
