package com.example.demo.dto;

import lombok.*;

import java.time.LocalDateTime;

@Getter
@Setter
@AllArgsConstructor
@NoArgsConstructor
public class TaskDto {
    private Long id;
    private String title;
    private String description;
    private LocalDateTime deadline;
}
