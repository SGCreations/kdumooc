__author__ = 'Sidath'


class Quiz:
    no_of_questions = ''
    username = ''
    module_id = 0
    type = ''
    cur_question_no = 0

    def __init__(self, username, module_id, no_of_questions, type):
        self.module_id = module_id
        self.no_of_questions = no_of_questions
        self.username = username
        self.type = type

    def increase_question_no(self, cur_question_no):
        self.cur_question_no += 1
