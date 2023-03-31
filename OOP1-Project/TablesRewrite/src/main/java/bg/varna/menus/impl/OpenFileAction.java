package bg.varna.menus.impl;

import bg.varna.menus.base.MenuAction;
import bg.varna.tables.base.Table;
import bg.varna.tables.base.TableDeserializer;
import bg.varna.tables.base.TableSerializer;
import bg.varna.util.XmlTableDeserializer;
import bg.varna.util.XmlTableSerializer;
import org.jdom2.JDOMException;

import java.io.File;
import java.io.IOException;
import java.util.Scanner;

public class OpenFileAction implements MenuAction {

    private Table<String, String, Double> table;
    private String filePath;
    private boolean fileOpened;
    private final Scanner scanner;

    public OpenFileAction() {
        this.table = null;
        this.filePath = null;
        this.fileOpened = false;
        this.scanner = new Scanner(System.in);
    }

    @Override
    public String getName() {
        return "Open file";
    }

    @Override
    public void execute() {
        boolean validPath = false;
        while (!validPath) {
            System.out.print("Enter the path of the file to open: ");
            filePath = scanner.nextLine();

            File file = new File(filePath);
            if (!file.exists()) {
                System.out.println("Error: File does not exist. Please enter a valid file path.");
            } else {
                try {
                    TableDeserializer<String, String, Double> deserializer = new XmlTableDeserializer<>();
                    table = deserializer.deserialize(filePath);

                    fileOpened = true;
                    System.out.println("File opened successfully.");
                    validPath = true;
                } catch (IOException | JDOMException e) {
                    System.out.println("Error: " + e.getMessage());
                    fileOpened = false;
                }
            }
        }
    }

    public boolean isFileOpened() {
        return fileOpened;
    }

    public String getFilePath() {
        return filePath;
    }

    public Table<String, String, Double> getTable() {
        return table;
    }

    public void save() {
        if (fileOpened) {
            try {
                TableSerializer<String, String, Double> serializer = new XmlTableSerializer<>(filePath);
                serializer.serialize(table);
                System.out.println("File saved successfully.");
            } catch (IOException e) {
                System.out.println("Error: " + e.getMessage());
            }
        } else {
            System.out.println("Error: No file opened.");
        }
    }
}
