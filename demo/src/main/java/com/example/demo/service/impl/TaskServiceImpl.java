package com.example.demo.service.impl;

import com.example.demo.dto.TaskDto;
import com.example.demo.model.Task;
import com.example.demo.repository.TaskRepository;
import com.example.demo.service.base.TaskService;
import lombok.RequiredArgsConstructor;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
@RequiredArgsConstructor
public class TaskServiceImpl implements TaskService {

    private final TaskRepository taskRepository;

    @Override
    public void addTask(TaskDto taskDto) {
        Task task = new Task();
        task.setTitle(taskDto.getTitle());
        task.setDescription(taskDto.getDescription());
        task.setDeadline(taskDto.getDeadline());
        taskRepository.save(task);
    }

    @Override
    public List<TaskDto> allTasks() {
        List<Task> all = taskRepository.findAll();
        //map all to TaskDto
        return all.stream().map(task -> {
            TaskDto taskDto = new TaskDto();
            taskDto.setId(task.getId());
            taskDto.setTitle(task.getTitle());
            taskDto.setDescription(task.getDescription());
            taskDto.setDeadline(task.getDeadline());
            return taskDto;
        }).toList();
    }

    @Override
    public void deleteTask(Long id) {
        taskRepository.deleteById(id);
    }
}
