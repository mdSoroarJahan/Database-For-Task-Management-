-- Active: 1739035017893@@127.0.0.1@3306@task_app


--Creating Tasks table
CREATE TABLE tasks(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL UNIQUE,
    description TEXT,
    priority ENUM('low', 'medium', 'high') DEFAULT 'low',
    is_completed TINYINT(1) NOT NULL DEFAULT 0 COMMENT '0: Not Completed, 1: Completed',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO tasks (title, description, priority, is_completed, created_at)
VALUES
('Finish Project Report', 'Complete the final report for the project due next week.', 'high', 0, '2025-01-05 08:30:00'),
('Prepare for Meeting', 'Prepare slides and agenda for the upcoming team meeting.', 'medium', 0, '2025-01-02 09:15:00'),
('Fix Bugs in Code', 'Resolve issues and fix bugs reported by QA team in the latest version of the app.', 'high', 0, '2025-01-10 14:45:00'),
('Update Website Content', 'Review and update the content on the homepage to reflect recent changes.', 'low', 0, '2025-01-03 11:00:00'),
('Conduct Code Review', 'Review code submitted by the team and provide feedback on improvements.', 'medium', 1, '2025-01-06 10:30:00'),
('Research New Features', 'Research new features to integrate into the next version of the product.', 'medium', 0, '2025-01-01 15:20:00'),
('Write Unit Tests', 'Write unit tests for the new module to ensure all functions work as expected.', 'high', 1, '2025-01-04 16:00:00'),
('Team Building Activity', 'Organize a team-building event for the office to promote collaboration and team spirit.', 'low', 0, '2025-01-09 13:00:00'),
('Server Maintenance', 'Perform maintenance and updates on the server to ensure optimal performance.', 'high', 0, '2025-01-08 12:00:00'),
('Client Feedback Call', 'Schedule and conduct a call with the client to gather feedback on the latest release.', 'medium', 1, '2025-01-07 17:30:00');
