import os
import time
import requests
import base64
from watchdog.observers import Observer
from watchdog.events import FileSystemEventHandler

class MyHandler(FileSystemEventHandler):
    def __init__(self, access_token, repository_owner, repository_name, file_path, commit_message):
        self.access_token = access_token
        self.repository_owner = repository_owner
        self.repository_name = repository_name
        self.file_path = file_path
        self.commit_message = commit_message
        self.upload_pending = False

    def on_modified(self, event):
        if event.src_path == self.file_path:
            if not self.upload_pending:
                print(f"Detected changes in {self.file_path}. Uploading to GitHub...")
                self.upload_pending = True
                self.schedule_upload()

    def schedule_upload(self):
        time.sleep(2)  # Wait for 2 seconds to allow any additional changes
        self.upload_pending = False
        self.commit_to_github()

    def commit_to_github(self):
        # ... (rest of the code remains the same) ...

if __name__ == "__main__":
    # ... (rest of the code remains the same) ...
