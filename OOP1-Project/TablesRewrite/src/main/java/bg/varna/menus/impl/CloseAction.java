package bg.varna.menus.impl;

import bg.varna.menus.base.MenuAction;

public class CloseAction implements MenuAction {
    private OpenFileAction openFileAction;

    public CloseAction(OpenFileAction openFileAction) {
        this.openFileAction = openFileAction;
    }

    @Override
    public String getName() {
        return "Close file";
    }

    @Override
    public void execute() {
        if (openFileAction.isFileOpened()) {
            openFileAction = new OpenFileAction();
            System.out.println("Successfully closed " + openFileAction.getFilePath() + ".");
        } else {
            System.out.println("Error: No file opened.");
        }
    }
}