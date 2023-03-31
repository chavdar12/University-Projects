package bg.varna.menus.impl;

import bg.varna.menus.base.MenuAction;

public class OpenAction implements MenuAction {
    @Override
    public String getName() {
        return "Open";
    }

    @Override
    public void execute() {
        Menu openSubMenu = new Menu();

        openSubMenu.addAction(new OpenFileAction());

        openSubMenu.run();
    }
}