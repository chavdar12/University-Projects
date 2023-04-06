package com.example.demo.controller;

import com.example.demo.dto.TaskDto;
import com.example.demo.service.base.TaskService;
import lombok.RequiredArgsConstructor;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/task")
@RequiredArgsConstructor
public class TaskController {

    private final TaskService taskService;


    @PostMapping("/add")
    public ResponseEntity<String> addTask(@RequestBody TaskDto taskDto){
        try{
            taskService.addTask(taskDto);
            return ResponseEntity.ok("Task added successfully");
        } catch (Exception e) {
            return ResponseEntity.badRequest().body(e.getMessage());
        }
    }

    @GetMapping("/all")
    public ResponseEntity<List<TaskDto>> allTasks(){
            return ResponseEntity.ok(taskService.allTasks());
    }

    @DeleteMapping("/delete/{id}")
    public ResponseEntity<String> deleteTask(@PathVariable Long id){
        try{
            taskService.deleteTask(id);
            return ResponseEntity.ok("Task deleted successfully");
        } catch (Exception e) {
            return ResponseEntity.badRequest().body(e.getMessage());
        }
    }
}
