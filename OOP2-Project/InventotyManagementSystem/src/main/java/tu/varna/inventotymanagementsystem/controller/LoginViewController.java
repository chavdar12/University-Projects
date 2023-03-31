package tu.varna.inventotymanagementsystem.controller;

import javafx.fxml.FXML;
import javafx.scene.control.Button;
import javafx.scene.control.TextField;

public class LoginViewController {
    @FXML
    public TextField emailField;
    @FXML
    public TextField passwordField;
    @FXML
    public Button loginButton;
    @FXML
    public Button registerButton;

    @FXML
    private void initialize() {

        emailField.textProperty().addListener((observable, oldValue, newValue) ->
                changeColors(newValue.matches("\\S+@\\S+\\.\\S+"), emailField));

        passwordField.textProperty().addListener((observable, oldValue, newValue) ->
                changeColors(newValue.matches("^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=!])(?=\\S+$).{8,}$"), passwordField));

       //disable button if email or password are not valid
        loginButton.disableProperty().bind(emailField.styleProperty().isEqualTo("-fx-border-color: red;").or(passwordField.styleProperty().isEqualTo("-fx-border-color: red;")));

        loginButton.setOnAction(event -> login());

        registerButton.setOnAction(event -> register());
    }

    private void register() {
        System.out.println("Register");
    }

    private void login() {
        System.out.println("Login");
    }

    private void changeColors(boolean value, TextField field) {
        if (!value) {
            field.setStyle("-fx-border-color: red");
        } else {
            field.setStyle("-fx-border-color: green");
        }
    }
}
