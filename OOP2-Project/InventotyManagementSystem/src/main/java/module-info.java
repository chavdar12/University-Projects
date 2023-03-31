module tu.varna.inventotymanagementsystem {
    requires javafx.controls;
    requires javafx.fxml;
    requires javafx.web;

    requires org.controlsfx.controls;
    requires com.dlsc.formsfx;
    requires net.synedra.validatorfx;
    requires org.kordamp.ikonli.javafx;
    requires org.kordamp.bootstrapfx.core;
    requires eu.hansolo.tilesfx;
    requires org.hibernate.orm.core;
    requires java.persistence;
    requires java.naming;
    requires java.sql;
    requires lombok;

    opens tu.varna.inventotymanagementsystem to javafx.fxml;
    exports tu.varna.inventotymanagementsystem;
    exports tu.varna.inventotymanagementsystem.controller;
    opens tu.varna.inventotymanagementsystem.controller to javafx.fxml;
    opens tu.varna.inventotymanagementsystem.entity to org.hibernate.orm.core;
}