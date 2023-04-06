package com.example.demo.service.base;

import com.example.demo.dto.TaskDto;
import lombok.AllArgsConstructor;
import org.springframework.stereotype.Service;

import java.util.List;


public interface TaskService {
    void addTask(TaskDto taskDto);

    List<TaskDto> allTasks();

    void deleteTask(Long id);
}
