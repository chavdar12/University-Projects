package bg.varna.menus.impl;

import bg.varna.menus.base.MenuAction;

import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

public class Menu {
    private final List<MenuAction> menuActions;
    private final Scanner scanner;
    private boolean exitMenu;

    public Menu() {
        menuActions = new ArrayList<>();
        scanner = new Scanner(System.in);
        exitMenu = false;
    }

    public void addAction(MenuAction action) {
        menuActions.add(action);
    }

    public void run() {
        while (!exitMenu) {
            printMenu();
            int choice = scanner.nextInt();
            scanner.nextLine(); // Clear the newline character from the input buffer
            if (choice >= 1 && choice <= menuActions.size()) {
                MenuAction action = menuActions.get(choice - 1);
                action.execute();
            } else if (choice == menuActions.size() + 1) {
                exitMenu = true; // Exit the menu
            } else {
                System.out.println("Invalid choice. Please try again.");
            }
        }
    }

    private void printMenu() {
        System.out.println("\nMenu:");
        int index = 1;
        for (MenuAction action : menuActions) {
            System.out.println(index + ". " + action.getName());
            index++;
        }
        System.out.println(index + ". Exit");
        System.out.print("Enter your choice: ");
    }
}
